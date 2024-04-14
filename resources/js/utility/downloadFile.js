const downloadZip = (url, e, fileName = ' application-forms.zip') => {
    const link = document.createElement('a');
    link.href = url;
    link.setAttribute('download', fileName);
    document.body.appendChild(link);
    link.click();
  }
  
  // Export the downloadZip function
  export { downloadZip };