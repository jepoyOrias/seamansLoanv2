export const objFormValidator = {
   /*
     errors: {
         effDate: { required: "Effective Date is required" },
         currency: { required: "Currency is required" }
     },
     fields: {
         effDate: { required: true },
         currency: { required: true }
     },
     default: {
         required: (_, obj) => `${obj.label} is required`,
         numeric: (_, obj) => `${obj.label} was not in correct format`,
         maxnumber: (field, obj) => `${field} was exceeded the maximum number ${obj.maxnumber}`,
         maxlength: (field, obj) => `${field} was exceeded the maxlength ${obj.maxlength}`
     },
     */
   errors: {},
   default: {},
   fields: {},
   hasError: function (field) {
      return !!(this.fields[field] || {}).error;
   },
   setFieldProp: function (field, prop, value) {
      (this.fields[field] || {})[prop] = value;
   },
   getFieldProp: function (field) {
      return this.fields[field] || {};
   },
   getFieldsKeyWithError: function () {
      return Object.keys(this.fields || {}).filter(
         (key) => !!(this.fields || {})[key].error
      );
   },
   getFieldsValueWithError: function () {
      return Object.values(this.fields || {}).filter((value) => !!value.error);
   },
   getErrorType: function (field) {
      return (this.fields[field] || {}).error;
   },
   getError: function (field) {
      const objErrorMSG = (this.errors[field] || this.default || {})[
         this.getErrorType(field)
      ];
      return typeof objErrorMSG === "function"
         ? objErrorMSG(field, this.fields[field])
         : objErrorMSG;
   },
   setError: function (field, type) {
      (this.fields[field] || {}).error = type;
   },
   addError: function (field, value) {
      (this.default || {})[field] = value;
   },
   removeError: function (field) {
      (this.fields[field] || {}).error = "";
   },
   validateFields: function (objFields) {
    // True if there's an error, false if no error
    let result = false;
    if (Array.isArray(objFields)) {
       // Iterate over each object in the array
    
       objFields.forEach((obj) => {
          Object.keys(obj).forEach((field) => {
             if (this.checkField(field, obj[field])) {
                result = true;
             }
          });
       });
    } else {
       // objFields is not an array, proceed with regular validation
       Object.keys(objFields || this.fields || {}).forEach((field) => {
          if (this.checkField(field, objFields[field])) {
             result = true;
          }
       });
    }
    return result;
 },
   checkField: function (field, value) {
      if (!this.fields[field]) return false;
      this.removeError(field);
      this.setFieldProp(field, "prev", value);
      for (let [type, typeValue] of Object.entries(this.fields[field])) {
         if (this.validator(type, typeValue, field, value)) {
            if (!this.getErrorType(field)) {
               this.setError(field, type);
            }
            return true;
         }
      }
      return false;
   },
   validator: function (type, typeValue, field, testValue) {
      switch (type) {
         case "required":
            if (typeValue === true) {
               return !testValue;
            }
            return false;
         case "numeric":
            if (typeValue === true && !!testValue) {
               return isNaN(Number(testValue));
            }
            return false;
         case "pattern":
            return !new RegExp(typeValue).test(testValue);
         case "minlength":
            if (!testValue) return false;
            return (testValue + "").length < Number(typeValue);
         case "maxlength":
            if (!testValue) return false;
            return (testValue + "").length > Number(typeValue);
         case "minnumber":
            if (!testValue) return false;
            if (isNaN(Number(testValue))) {
               this.setError(field, "internal");
               this.addError("internal", "number is required.");
               return true;
            }
            return Number(testValue) < Number(typeValue);
         case "maxnumber":
            if (!testValue) return false;
            if (isNaN(Number(testValue))) {
               this.setError(field, "internal");
               this.addError("internal", "number is required.");
               return true;
            }
            return Number(testValue) > Number(typeValue);
         default:
            return false;
      }
   },
   clearErrors: function () {
      Object.keys(this.fields || {}).forEach((field) => {
         this.removeError(field);
      });
   }
};
