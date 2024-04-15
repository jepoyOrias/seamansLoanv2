<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seaman Loan Express Application Form</title>
</head>
<style>
    @font-face {
        font-family: 'CIDFont-F1_8';
        font-style: normal;
        font-weight: 400;
        src: url('{{ storage_path('app/fonts/CIDFont-F1_8.woff') }}');
    }

    @font-face {
        font-family: 'CIDFont-F2_g';
        font-style: normal;
        font-weight: 400;
        src: url('{{ storage_path('app/fonts/CIDFont-F2_g.woff') }}');
    }

    /* Apply the font to the entire document */
    body {
        font-family: 'CIDFont-F2_g', sans-serif;
        color: #000;
    }
    .sanserif{
        font-family: sans-serif;
    }

    /* Adjust margins for the entire document */
    @page {
        margin: 20px 30px;
    }

    .application-form-title {
        font-size: 20px;
        text-transform: uppercase;
        font-weight: 700;
        font-family: 'CIDFont-F2_g', sans-serif;
        font-size: 14px;
    }

    .d-flex {
        display: flex !important;
    }

    .text-size10 {
        font-size: 10px;
    }

    .text-size12 {
        font-size: 12px;
    }

    .text-size14 {
        font-size: 14px;
    }

    .radio-group {
        margin-left: 30px;
        font-size: 14px;

    }
    .custom-list {
  list-style-type: none; /* Remove the default list marker */
}

.custom-list li:before {
  content: "-"; /* Use dash as the list marker */
  margin-right: 10px; /* Adjust spacing between the marker and text */
}
.relative{
    position: relative;
}
    .table .radio-group:first-child {
        margin-left: 0 !important;

    }

    .radio-group>* {
        vertical-align: middle
    }

    .border {
        border: 1px solid;
    }

    .text-center {
        text-align: center;
    }

    .p-1 {
        padding-top: 5px;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
    }
    .fw-bold{
        font-weight: 700;
    }
    .fw-semibold{
        font-weight: 600;
    }
    table{
        width: 100%;
    }
    .page-break {
    page-break-after: always;
}
</style>

<body>
    <table>
        <tbody>
            <tr style="vertical-align:top">
                <td style="width: 580px">
                    <div class="application-form-title">Loan Application Form</div>
                </td>
                <td style="width: 150px;padding-right:10px; font-size:15px">
                    Date: <div 
                        style="font-size:14px;color:black !important; border-bottom: 1px solid; float: right; width:65%; margin-top:5px" class="sanserif">
                        {{ \Carbon\Carbon::now()->format('m/d/y') }}
                    </div>
                </td>
                <td> <img src="{{ asset('images/pdfLogo.jpg') }}" alt="" width="200"></td>
            </tr>
        </tbody>


    </table>
    <table>
        <tbody>
            <tr>
                <td class="text-size12">To apply, submit completely filled-out loan application form & documentary
                    requirements.</td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td class="text-size14" style="width: 500px" colspan="">
                    Source:
                    <div class="radio-group" style="float: right">
                        <input type="radio" name="" id="radio3" />
                        <label for="radio3">Telemarketer</label>
                    </div>
                    <div class="radio-group" style="float: right">
                        <input type="radio" name="" id="radio2" checked />
                        <label for="radio2">Loan Specialist</label>
                    </div>
                    <div class="radio-group" style="float: right">
                        <input type="radio" name="" id="radio1" />
                        <label for="radio1">Walk in</label>
                    </div>
                </td>
                <td style="width: 400px; padding-left: 150px;padding-right:10px" class="text-size14">
                    Loan Specialist: <div
                        style="font-size:15px;color:black !important; float: right; width:55%; margin-right:70px" class="sanserif">Ian
                        Fhabi Lofranco</div>
                </td>
            </tr>

        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td>
                    <div style="text-align: right;width:740px;" class="text-size14">Telemarketer:</div>
                </td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td class="text-size14" style="width: 600px" colspan="">
                    Type of Loan applied for:
                </td>
                <td style="width: 300px; padding-left: 50px;padding-right:10px;float:left" class="text-size14">
                    Purpose of Loan:
                    <div
                        style="font-size:10px;color:black ;border-bottom: 1px solid;!important; float:right; text-wrap:nowrap !important;
                            width:40%;margin-right:40px; text-align:center" class="sanserif">
                        {{ $borrower['loan_purpose'] }}</div>
                </td>
            </tr>
            <tr>
                <td class="text-size14">
                    <div class="radio-group" style="float: left; margin-left:0">
                        <input type="radio" name="collateral" id="radio4" checked/>
                        <label for="radio4" >Non-Collateral</label>
                    </div>
                    <div class="radio-group" style="float: left">
                        <input type="radio" name="collateral" id="radio5" />
                        <label for="radio5">Collateral</label>
                    </div>
                </td>
                <td style="width: 300px; padding-left: 50px;padding-right:10px;float:left" class="text-size14">
                    Desired Loan Amount:
                    <div
                        style="font-size:15px;color:black ;border-bottom: 1px solid;!important; float:right; width:40%;margin-right:40px; text-align:center" class="sanserif">
                        {{ number_format($borrower['amount'], 2) }}</div>
                </td>
            </tr>
            <tr>
                <td class="text-size14">
                    If with Collateral; type of vehicle:___________________
                </td>
                <td style="width: 300px; padding-left: 50px;padding-right:10px;float:left" class="text-size14">
                    Desired Term:
                    <div
                        style="font-size:15px;color:black ;border-bottom: 1px solid;!important; float:right; width:55%;margin-right:40px; text-align:center" class="sanserif">
                        {{ $borrower['term_months'] }} months</div>
                </td>
            </tr>
            <tr>
                <div class="text-size14">Collateral Details:______________________________</div>
                <div class="text-size14">Make/Model:_________________________________</div>
                <div class="text-size14">Year Model:__________________________________</div>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; border-collapse: collapse; border:1px solid #000 !important;">
        <tr style="background: #000; color:#fff; width:100%">
            <td colspan="12" style="padding-left:10px" class="text-size14 ">BORROWER'S PERSONAL INFORMATION
                (MANDATORY)</td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1" style="width:130px">FULL NAME</td>
            <td class="border p-1" colspan="8">
                <div class="text-size10">(Last Name, First Name, Middle Name)</div>
                <div class="text-size12 sanserif">
                    {{ $borrower['personal_information']['lastname'] }}, 
                    {{ $borrower['personal_information']['firstname'] }}, 
                    {{ $borrower['personal_information']['middlename'] }}, 
                    {{ $borrower['personal_information']['suffix'] }}
                </div>
            </td>
            <td class="border p-1" style="" colspan="3">
                <div tyle="float: left; " class="text-size12">
                    Civil Status
                </div>
                <div style="width:70%; float: right; margin-top: -20px">
                    @if (isset($borrower['personal_information']['civil_status']))
                        <div class="radio-group">
                            <input type="radio" id="single" name="civil_status" value="Single"
                                {{ $borrower['personal_information']['civil_status'] == 'Single' ? 'checked' : '' }}>
                            <label for="single">Single</label>
                        </div>
                        <div class="radio-group">
                            <input type="radio" id="married" name="civil_status" value="Married"
                                {{ $borrower['personal_information']['civil_status'] != 'Single' ? 'checked' : '' }}>
                            <label for="married">Married</label>
                        </div>
                    @endif
                </div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1">DATE OF BIRTH <br>/ PLACE OF BIRTH</td>
            <td class="border  p-1" colspan="11">
                <div style="float: left; width:50%; color:#000" class="text-size12">
                    (MM/DD/YYYY)
                    <br>
                    <div class="text-size12 sanserif" >
                        {{ \Carbon\Carbon::parse($borrower['personal_information']['birth_date'])->format('m/d/Y') }}
                    </div>
                </div>
                <div style="float: left" class="text-size12">
                    Place of Birth(City/Municipality)
                    <br>
                    <div class="text-size12 sanserif">
                        {{ $borrower['personal_information']['place_of_birth'] }}
                    </div>
                </div>

            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1">
                PRESENT ADDRESS
                <br>
                <div class="radio-group" style="text-align:left;width:100%">
                    <input type="radio" id="same_as_permanent" name="civil_status" value="same_as_permanent" style="margin-left:-35px"
                        {{$borrower['personal_information']['present_address'] == $borrower['personal_information']['permanent_address'] ? 'checked' : '' }}>
                    <label for="same_as_permanent" class="text-size10">Same as Permanent Address</label>
                </div>
            </td>
            <td class="border  p-1  text-size12" style="position: relative" colspan="10">
                <div class="radio-group" style="float: left;margin-left:15px">
                    <input type="radio" name="address_ownership" id="radio3" value="Owned" {{ $borrower['personal_information']['address_ownership'] == 'Owned' ? 'checked' : '' }}>
                    <label for="radio3">Owned</label>
                </div>
                <div class="radio-group" style="float: left;margin-left:15px">
                    <input type="radio" name="address_ownership" id="radio2" value="Owned/Mortgage" {{ $borrower['personal_information']['address_ownership'] == 'Owned/Mortgage' ? 'checked' : '' }}>
                    <label for="radio2">Owned/Mortgage</label>
                </div>
                <div class="radio-group" style="float: left;margin-left:15px">
                    <input type="radio" name="address_ownership" id="radio1" value="Living w/ Relatives" {{ $borrower['personal_information']['address_ownership'] == 'Living w/ Relatives' ? 'checked' : '' }}>
                    <label for="radio1">Living w/ Relatives</label>
                </div>
                <div class="radio-group" style="float: left;margin-left:15px">
                    <input type="radio" name="address_ownership" id="radio1" value="Renting" {{ $borrower['personal_information']['address_ownership'] == 'Renting' ? 'checked' : '' }}>
                    <label for="radio1">Renting</label>
                </div>
                <div style="position: absolute;top:30px; left:25px;" class="sanserif">
                    {{ $borrower['personal_information']['present_address'] != $borrower['personal_information']['permanent_address'] ? $borrower['personal_information']['present_address'] : ''  }}
                </div>
            </td>
            <td class="border p-1 text-size12" colspan="1" style="width:100px">
                <div style="float: left; width:100%;font-size:10px;">
                    LENGTH OF STAY
                    <br>
                    {{ $borrower['personal_information']['present_address_length'] }}
                </div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1" style="max-height: 40px">
                PROVINCIAL ADDRESS
            </td>
            <td class="border  p-1  text-size12 sanserif" colspan="10">
                {{ $borrower['personal_information']['provincial_address'] }}
            </td>
            <td class="border p-1 text-size12" colspan="1" style="width:100px">
                <div style="float: left; width:100%;font-size:10px;">
                    LENGTH OF STAY
                    <br>
                    {{ $borrower['personal_information']['provincial_address_length'] }}
                </div>
            </td>
        </tr>
         <tr>
            <td class="border text-center p-1 text-size12" colspan="1" style="max-height: 40px">
                PERMANENT ADDRESS
            </td>
            <td class="border  p-1 sanserif text-size12" colspan="10">
                {{ $borrower['personal_information']['permanent_address'] }},
            </td>
            <td class="border p-1 text-size12" colspan="1" style="width:100px">
                <div style="float: left; width:100%;font-size:10px;">
                    LENGTH OF STAY
                    <br>
                    {{ $borrower['personal_information']['permanent_address_length'] }},
                </div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1" style="max-height: 40px">
                CONTACT DETAILS
            </td>
            <td class="border  p-0  text-size12" colspan="11">
                <div class="radio-group" style="float: left;margin-right:50px;font-size: 12px">
                    MOBILE NUMBER
                    <br>
                    <div class="text-size12 sanserif"  >
                    {{ $borrower['personal_information']['phone_number'] }}
                    </div>
                </div>
                <div class="radio-group" style="float: left;margin-right:50px;font-size: 12px">
                    EMAIL ADDRESS
                    <br>
                    <div class="text-size12 sanserif"  >
                        {{ $borrower['personal_information']['email'] }}
                    </div>
                </div>
                <div class="radio-group" style="float: left;margin-right:50px;font-size: 12px">
                    FACEBOOK/VIBER
                    <br>
                    <div class="text-size12 sanserif"  >
                        {{ $borrower['personal_information']['facebook_account_name'] }}
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1">
                NATIONALITY
            </td>
            <td class="border p-1 text-size12" colspan="11">
                <div class="radio-group" style="float: left; margin-left: 15px">
                    <input type="radio" name="nationality" id="filipino" value="Filipino" {{ $borrower['personal_information']['nationality'] === 'Filipino' ? 'checked' : '' }}>
                    <label for="filipino">Filipino</label>
                </div>
                <div class="radio-group" style="float: left; margin-left: 15px">
                    <input type="radio" name="nationality" id="others" value="Others" {{ $borrower['personal_information']['nationality'] !== 'Filipino' ? 'checked' : '' }}>
                    <label for="others">Others</label>
                </div>
                
                <div class="radio-group" style="float:left;width:320px; margin-right: 30px;">
                    IF "OTHERS" PLEASE SPECIFY:
                    <div style="border-bottom: 1px solid #000;width:100px; float: right;">{{ $borrower['personal_information']['nationality']  }}</div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1">
                TIN / SSS / GSIS No.
            </td>
            <td class="border  p-1  text-size12" colspan="11">
                <div class="radio-group" style="float: left;margin-right:100px">
                    TIN #: {{ $borrower['personal_information']['TIN_NO'] ?? null}}
                </div>
                <div class="radio-group" style="float: left;margin-right:100px">
                    SSS #:   {{ $borrower['personal_information']['SSS_NO'] ?? null }} 
                </div>
                <div class="radio-group" style="float: left;margin-right:100px">
                    GSIS #:   {{ $borrower['personal_information']['gsis'] ?? null}}
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="8">
                <div class="text-size12" style="margin-left:10px; color #000">HIGHEST EDUCATIONAL ATTAINMENT:</div>
                <div class="p-1 text-size12" style="width: 100%;">
                    <div style="float: left; width:150px">
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="education" id="high_school" value="High School" {{ $borrower['personal_information']['education'] === 'High School' ? 'checked' : '' }}>
                            <label for="high_school">High School</label>
                        </div>
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="education" id="undergraduate_1" value="Undergraduate" {{ $borrower['personal_information']['education'] === 'Undergraduate' ? 'checked' : '' }}>
                            <label for="undergraduate_1">Undergraduate</label>
                        </div>
                    </div>
                    <div style="float: right; width: 200px;">
                        <div class="radio-group" style="margin-left:0">
                            <input type="radio" name="education" id="post_graduate" value="Post Graduate" {{ $borrower['personal_information']['education'] === 'Post Graduate' ? 'checked' : '' }}>
                            <label for="post_graduate">Post Graduate</label>
                        </div>
                    </div>
                    <div style="float: right; width:150px">
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="education" id="graduate" value="Graduate" {{ $borrower['personal_information']['education'] === 'Graduate' ? 'checked' : '' }}>
                            <label for="graduate">Graduate</label>
                        </div>
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="education" id="others" value="Others" {{ !in_array($borrower['personal_information']['education'], ['High School', 'Undergraduate', 'Graduate', 'Post Graduate']) ? 'checked' : '' }}>
                            <label for="others" style="border-bottom: 1px solid #000;">{{ !in_array($borrower['personal_information']['education'], ['High School', 'Undergraduate', 'Graduate', 'Post Graduate']) ? $borrower['personal_information']['education'] : '' }}</label>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                
            </td>
            <td colspan="4">
                <div class="text-size12" style="margin-left:10px; color: #000;">SOURCE OF FUNDS:</div>
                <div class="p-1 text-size12" style="width: 100%; overflow: hidden;">
                    <div style="float: left; width:150px">
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="source_of_funds" id="salary_profession" value="Salary/Profession" {{ $borrower['personal_information']['source_of_fund'] === 'Salary/Profession' ? 'checked' : '' }}>
                            <label for="salary_profession">Salary/Profession</label>
                        </div>
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="source_of_funds" id="business" value="Business" {{ $borrower['personal_information']['source_of_fund'] === 'Business' ? 'checked' : '' }}>
                            <label for="business">Business</label>
                        </div>
                    </div>
                    <div style="float: right; width: 150px;">
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="source_of_funds" id="remittance" value="Remittance" {{ $borrower['personal_information']['source_of_fund'] === 'Remittance' ? 'checked' : '' }}>
                            <label for="remittance">Remittance</label>
                        </div>
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="source_of_funds" id="others" value="Others" {{ !in_array($borrower['personal_information']['source_of_fund'], ['Salary/Profession', 'Business', 'Remittance']) ? 'checked' : '' }}>
                            <label for="others" style="border-bottom: 1px solid #000;">{{ !in_array($borrower['personal_information']['source_of_fund'], ['Salary/Profession', 'Business', 'Remittance']) ? $borrower['personal_information']['source_of_fund'] : '' }}</label>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
    <table style="width: 100%; border-collapse: collapse; border:1px solid #000 !important;">
        <tr style="background: #000; color:#fff; width:100%">
            <td colspan="12" style="padding-left:10px;" class="text-size14 ">INCOME INFORMATION</td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1" style="max-height: 40px;min-width:27px; width:130px;">
                NAME OF EMPLOYER / BUSINESS
            </td>
            <td class="border text-center  text-size12" colspan="5" style="min-width: 200px; position:relative">
                <div style="position: absolute; top: 0;left:50%; transform:translateX(-50%)">EMPLOYED</div>
                <div class="sanserif">{{ $borrower['personal_information']['employer_information']['name_of_employer'] }}</div>
            </td>
            <td class="border text-center  text-size12" colspan="6" style="min-width: 200px; position:relative">
                <div style="position: absolute; top: 0;left:50%; transform:translateX(-50%)">SELF EMPLOYED/BUSINESS</div>
                <div class="sanserif"></div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1" style="max-height: 40px;min-width:27px; width:130px;">
                OFFICE/BUSINESS ADDRESS
            </td>
            <td class="border text-center  text-size12" colspan="5" style="min-width: 200px; position:relative">
              
                <div class="sanserif">{{ $borrower['personal_information']['employer_information']['office_address'] }}</div>
            </td>
            <td class="border text-center  text-size12" colspan="6" style="min-width: 200px; position:relative">
                <div class="sanserif"></div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1" style="max-height: 40px;min-width:27px; width:130px;">
                NATURE OF BUSINESS / EMPLOYMENT
            </td>
            <td class="border text-center  text-size12" colspan="5" style="min-width: 200px; position:relative">
              
                <div class="sanserif">{{ $borrower['personal_information']['employer_information']['office_address'] }}</div>
            </td>
            <td class="border text-center  text-size12" colspan="6" style="min-width: 200px; position:relative">
                <div class="sanserif"></div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1" style="max-height: 40px;min-width:27px; width:130px;">
                CONTACT INFO.
            </td>
            <td class="border text-center  text-size12" colspan="5" style="min-width: 200px; position:relative">
              
                <div class="sanserif">{{ $borrower['personal_information']['employer_information']['office_address'] }}</div>
            </td>
            <td class="border text-center  text-size12" colspan="6" style="min-width: 200px; position:relative">
                <div class="sanserif"></div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1" style="max-height: 40px;min-width:27px; width:130px;">
                DESIGNATION / POSITION
            </td>
            <td class="border text-center  text-size12" colspan="5" style="min-width: 200px; position:relative">
              
                <div class="sanserif">{{ $borrower['personal_information']['employer_information']['office_address'] }}</div>
            </td>
            <td class="border text-center  text-size12" colspan="6" style="min-width: 200px; position:relative">
                <div class="sanserif"></div>
            </td>
        </tr>
    </table>
    <table style="width: 100%; border-collapse: collapse; border:1px solid #000 !important;">
        <tr style="background: #000; color:#fff; width:100%">
            <td colspan="12" style="padding-left:10px;" class="text-size14 ">CHARACTER REFERENCES <span style="font-size:10px">(NOT LIVING IN THE SAME HOUSEHOLD)</span></td>
        </tr>
        <tr>
            <td colspan="4" class="border text-center p-1 text-size14" style="padding-top: 5px;padding-bottom:5px">Name</td>
            <td colspan="4" class="border text-center p-1 text-size14" style="padding-top: 5px;padding-bottom:5px">Address</td>
            <td colspan="4" class="border text-center p-1 text-size14" style="padding-top: 5px;padding-bottom:5px">Contact Number</td>
        </tr>
        @for ($i = 0; $i < 4; $i++)
        @php
            $reference = $borrower['personal_information']['contact_references'][$i] ?? null;
        @endphp
        <tr>
            @if ($reference)
                <td colspan="4" class="border text-center p-1 text-size12 sanserif" style="padding-top: 5px; padding-bottom: 5px;">{{ $reference['name'] }}</td>
                <td colspan="4" class="border text-center p-1 text-size12 sanserif" style="padding-top: 5px; padding-bottom: 5px;">{{ $reference['address'] ?? '' }}</td>
                <td colspan="4" class="border text-center p-1 text-size12 sanserif" style="padding-top: 5px; padding-bottom: 5px;">{{ $reference['mobile_number'] }}</td>
            @else
                <td colspan="4" class="border" style="height: 15px;"></td>
                <td colspan="4" class="border" style="height: 15px;"></td>
                <td colspan="4" class="border" style="height: 15px;"></td>
            @endif
        </tr>
    @endfor
    </table>
    <table style="width: 100%; border-collapse: collapse; border:1px solid #000 !important;">
        <tr style="background: #000; color:#fff; width:100%">
            <td colspan="12" style="padding-left:10px" class="text-size14 ">CO-BORROWER'S PERSONAL INFORMATION (MANDATORY)
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1  text-size12" colspan="1" style="width:130px">FULL NAME</td>
            <td class="border p-1" colspan="8">
                <div class="text-size10">(Last Name, First Name, Middle Name)</div>
                <div class="text-size12 sanserif">
                    {{ $borrower['personal_information']['lastname'] }}, 
                    {{ $borrower['personal_information']['firstname'] }}, 
                    {{ $borrower['personal_information']['middlename'] }}, 
                    {{ $borrower['personal_information']['suffix'] }}
                </div>
            </td>
            <td class="border p-1" style="" colspan="3">
                <div tyle="float: left; " class="text-size12">
                    Civil Status
                </div>
                <div style="width:70%; float: right; margin-top: -20px">
                    @if (isset($borrower['personal_information']['coborrowers'][0]['civil_status']))
                        <div class="radio-group">
                            <input type="radio" id="single" name="civil_status" value="Single"
                                {{ $borrower['personal_information']['coborrowers'][0]['civil_status'] == 'Single' ? 'checked' : '' }}>
                            <label for="single">Single</label>
                        </div>
                        <div class="radio-group">
                            <input type="radio" id="married" name="civil_status" value="Married"
                                {{ $borrower['personal_information']['coborrowers'][0]['civil_status'] != 'Single' ? 'checked' : '' }}>
                            <label for="married">Married</label>
                        </div>
                    @endif
                </div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1">DATE OF BIRTH <br>/ PLACE OF BIRTH</td>
            <td class="border  p-1" colspan="11">
                <div style="float: left; width:50%; color:#000" class="text-size12">
                    (MM/DD/YYYY)
                    <br>
                    <div class="text-size12 sanserif" >
                        {{ \Carbon\Carbon::parse($borrower['personal_information']['coborrowers'][0]['birth_date'])->format('m/d/Y') }}
                    </div>
                </div>
                <div style="float: left" class="text-size12">
                    Place of Birth(City/Municipality)
                    <br>
                    <div class="text-size12 sanserif">
                        {{ $borrower['personal_information']['coborrowers'][0]['place_of_birth'] }}
                    </div>
                </div>

            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12 " colspan="1">
                PRESENT ADDRESS
                <br>
                <div class="radio-group" style="text-align:left;width:100%">
                    <input type="radio" id="same_as_permanent" name="civil_status" value="same_as_permanent" style="margin-left:-35px"
                        {{$borrower['personal_information']['coborrowers'][0]['present_address'] === $borrower['personal_information']['coborrowers'][0]['permanent_address'] ? 'checked' : '' }}>
                    <label for="same_as_permanent" class="text-size10">Same as Permanent Address</label>
                </div>
            </td>
            <td class="border  p-1  text-size12 relative" colspan="10">
                <div class="radio-group" style="float: left;margin-left:15px">
                    <input type="radio" name="address_ownership" id="radio3" value="Owned" {{ $borrower['personal_information']['coborrowers'][0]['address_ownership'] === 'Owned' ? 'checked' : '' }}>
                    <label for="radio3">Owned</label>
                </div>
                <div class="radio-group" style="float: left;margin-left:15px">
                    <input type="radio" name="address_ownership" id="radio2" value="Owned/Mortgage" {{ $borrower['personal_information']['coborrowers'][0]['address_ownership'] === 'Owned/Mortgage' ? 'checked' : '' }}>
                    <label for="radio2">Owned/Mortgage</label>
                </div>
                <div class="radio-group" style="float: left;margin-left:15px">
                    <input type="radio" name="address_ownership" id="radio1" value="Living w/ Relatives" {{ $borrower['personal_information']['coborrowers'][0]['address_ownership'] === 'Living w/ Relatives' ? 'checked' : '' }}>
                    <label for="radio1">Living w/ Relatives</label>
                </div>
                <div class="radio-group" style="float: left;margin-left:15px">
                    <input type="radio" name="address_ownership" id="radio1" value="Renting" {{ $borrower['personal_information']['coborrowers'][0]['address_ownership'] === 'Renting' ? 'checked' : '' }}>
                    <label for="radio1">Renting</label>
                </div>
                <div style="position: absolute;top:30px; left:25px;" class="sanserif">
                    {{ $borrower['personal_information']['coborrowers'][0]['present_address'] != $borrower['personal_information']['coborrowers'][0]['permanent_address'] ? $borrower['personal_information']['coborrowers'][0]['present_address'] : ''  }}
                </div>
            </td>
            <td class="border p-1 text-size12" colspan="1" style="width:100px">
                <div style="float: left; width:100%;font-size:10px;">
                    LENGTH OF STAY
                    <br>
                    {{ $borrower['personal_information']['coborrowers'][0]['present_address_length'] }}
                </div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1" style="max-height: 40px">
                PROVINCIAL ADDRESS
            </td>
            <td class="border  p-1  text-size12 sanserif" colspan="10">
              
                {{ $borrower['personal_information']['coborrowers'][0]['provincial_address'] }}
            </td>
            <td class="border p-1 text-size12" colspan="1" style="width:100px">
                <div style="float: left; width:100%;font-size:10px;">
                    LENGTH OF STAY
                    <br>
                    {{ $borrower['personal_information']['coborrowers'][0]['provincial_address_length'] }}
                </div>
            </td>
        </tr>
         <tr>
            <td class="border text-center p-1 text-size12" colspan="1" style="max-height: 40px">
                PERMANENT ADDRESS
            </td>
            <td class="border  p-1 sanserif text-size12" colspan="10">
                {{ $borrower['personal_information']['coborrowers'][0]['permanent_address'] }},
            </td>
            <td class="border p-1 text-size12" colspan="1" style="width:100px">
                <div style="float: left; width:100%;font-size:10px;">
                    LENGTH OF STAY
                    <br>
                    {{ $borrower['personal_information']['coborrowers'][0]['permanent_address_length'] }},
                </div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1" style="max-height: 40px">
                CONTACT DETAILS
            </td>
            <td class="border  p-0  text-size12" colspan="11">
                <div class="radio-group" style="float: left;margin-right:50px;font-size: 12px">
                    MOBILE NUMBER
                    <br>
                    <div class="text-size12 sanserif"  >
                    {{ $borrower['personal_information']['coborrowers'][0]['phone_number'] }}
                    </div>
                </div>
                <div class="radio-group" style="float: left;margin-right:50px;font-size: 12px">
                    EMAIL ADDRESS
                    <br>
                    <div class="text-size12 sanserif"  >
                        {{ $borrower['personal_information']['coborrowers'][0]['email'] }}
                    </div>
                </div>
                <div class="radio-group" style="float: left;margin-right:50px;font-size: 12px">
                    FACEBOOK/VIBER
                    <br>
                    <div class="text-size12 sanserif"  >
                        {{ $borrower['personal_information']['coborrowers'][0]['facebook_account_name'] }}
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1">
                NATIONALITY
            </td>
            <td class="border p-1 text-size12" colspan="11">
                <div class="radio-group" style="float: left; margin-left: 15px">
                    <input type="radio" name="nationality" id="filipino" value="Filipino" {{ $borrower['personal_information']['coborrowers'][0]['nationality'] === 'Filipino' ? 'checked' : '' }}>
                    <label for="filipino">Filipino</label>
                </div>
                <div class="radio-group" style="float: left; margin-left: 15px">
                    <input type="radio" name="nationality" id="others" value="Others" {{ $borrower['personal_information']['coborrowers'][0]['nationality'] !== 'Filipino' ? 'checked' : '' }}>
                    <label for="others">Others</label>
                </div>
                
                <div class="radio-group" style="float:left;width:320px">
                    IF "OTHERS" PLEASE SPECIFY:
                    <div style="border-bottom: 1px solid #000;width:100px ; float: right;">{{ $borrower['personal_information']['coborrowers'][0]['nationality']  }}</div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="border text-center p-1 text-size12" colspan="1">
                TIN / SSS / GSIS No.
            </td>
            <td class="border  p-1  text-size12" colspan="11">
                <div class="radio-group" style="float: left;margin-right:100px">
                    TIN #: {{ $borrower['personal_information']['coborrowers'][0]['TIN_NO'] ?? null}}
                </div>
                <div class="radio-group" style="float: left;margin-right:100px">
                    SSS #:   {{ $borrower['personal_information']['coborrowers'][0]['SSS_NO'] ?? null }} 
                </div>
                <div class="radio-group" style="float: left;margin-right:100px">
                    GSIS #:   {{ $borrower['personal_information']['coborrowers'][0]['gsis'] ?? null}}
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="8">
                <div class="text-size12" style="margin-left:10px; color #000">HIGHEST EDUCATIONAL ATTAINMENT:</div>
                <div class="p-1 text-size12" style="width: 100%;">
                    <div style="float: left; width:150px">
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="education" id="high_school" value="High School" {{ $borrower['personal_information']['coborrowers'][0]['education'] === 'High School' ? 'checked' : '' }}>
                            <label for="high_school">High School</label>
                        </div>
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="education" id="undergraduate_1" value="Undergraduate" {{ $borrower['personal_information']['coborrowers'][0]['education'] === 'Undergraduate' ? 'checked' : '' }}>
                            <label for="undergraduate_1">Undergraduate</label>
                        </div>
                    </div>
                    <div style="float: right; width: 200px;">
                        <div class="radio-group" style="margin-left:0">
                            <input type="radio" name="education" id="post_graduate" value="Post Graduate" {{ $borrower['personal_information']['coborrowers'][0]['education'] === 'Post Graduate' ? 'checked' : '' }}>
                            <label for="post_graduate">Post Graduate</label>
                        </div>
                    </div>
                    <div style="float: right; width:150px">
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="education" id="graduate" value="Graduate" {{ $borrower['personal_information']['coborrowers'][0]['education'] === 'Graduate' ? 'checked' : '' }}>
                            <label for="graduate">Graduate</label>
                        </div>
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="education" id="others" value="Others" {{ !in_array($borrower['personal_information']['coborrowers'][0]['education'], ['High School', 'Undergraduate', 'Graduate', 'Post Graduate']) ? 'checked' : '' }}>
                            <label for="others" style="border-bottom: 1px solid #000;">{{ !in_array($borrower['personal_information']['coborrowers'][0]['education'], ['High School', 'Undergraduate', 'Graduate', 'Post Graduate']) ? $borrower['personal_information']['coborrowers'][0]['education'] : '' }}</label>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                
            </td>
            <td colspan="4">
                <div class="text-size12" style="margin-left:10px; color: #000;">SOURCE OF FUNDS:</div>
                <div class="p-1 text-size12" style="width: 100%; overflow: hidden;">
                    <div style="float: left; width:150px">
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="source_of_funds" id="salary_profession" value="Salary/Profession" {{ $borrower['personal_information']['coborrowers'][0]['source_of_fund'] === 'Salary/Profession' ? 'checked' : '' }}>
                            <label for="salary_profession">Salary/Profession</label>
                        </div>
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="source_of_funds" id="business" value="Business" {{ $borrower['personal_information']['coborrowers'][0]['source_of_fund'] === 'Business' ? 'checked' : '' }}>
                            <label for="business">Business</label>
                        </div>
                    </div>
                    <div style="float: right; width: 150px;">
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="source_of_funds" id="remittance" value="Remittance" {{ $borrower['personal_information']['coborrowers'][0]['source_of_fund'] === 'Remittance' ? 'checked' : '' }}>
                            <label for="remittance">Remittance</label>
                        </div>
                        <div class="radio-group" style="margin-left: 0;">
                            <input type="radio" name="source_of_funds" id="others" value="Others" {{ !in_array($borrower['personal_information']['coborrowers'][0]['source_of_fund'], ['Salary/Profession', 'Business', 'Remittance']) ? 'checked' : '' }}>
                            <label for="others" style="border-bottom: 1px solid #000;">{{ !in_array($borrower['personal_information']['coborrowers'][0]['source_of_fund'], ['Salary/Profession', 'Business', 'Remittance']) ? $borrower['personal_information']['coborrowers'][0]['source_of_fund'] : '' }}</label>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
    <table style="width: 100%; border-collapse: collapse; border:1px solid #000 !important;">
        <tr style="background: #000; color:#fff; width:100%">
            <td colspan="20" style="padding-left:10px;" class="text-size14 text-center">BANK ACCOUNT(S)</td>
        </tr>
            <tr>
                <td colspan="4" class="border text-center p-1 text-size14" style="padding-top: 5px; padding-bottom: 5px;"">BANK</td>
                <td colspan="4" class="border text-center p-1 text-size14" style="padding-top: 5px; padding-bottom: 5px;"">BRANCH</td>
                <td colspan="4" class="border text-center p-1 text-size14" style="padding-top: 5px; padding-bottom: 5px;"">DATE OPENED</td>
                <td colspan="4" class="border text-center p-1 text-size14" style="padding-top: 5px; padding-bottom: 5px;"">ACCOUNT TYPE</td>
                <td colspan="4" class="border text-center p-1 text-size14" style="padding-top: 5px; padding-bottom: 5px;">ACCOUNT NUMBER</td>
            </tr>

        <tr>
       
                <td colspan="4" class="border text-center p-1 text-size12 sanserif" style="padding-top: 5px; padding-bottom: 5px;">{{ $borrower['releasing']['bank'] }}</td>
                <td colspan="4" class="border text-center p-1 text-size12 sanserif" style="padding-top: 5px; padding-bottom: 5px;">{{$borrower['releasing']['branch'] }}</td>
                <td colspan="4" class="border text-center p-1 text-size12 sanserif" style="padding-top: 5px; padding-bottom: 5px;">{{$borrower['releasing']['date_opened'] }}</td>
                <td colspan="4" class="border text-center p-1 text-size12 sanserif" style="padding-top: 5px; padding-bottom: 5px;">{{$borrower['releasing']['account_type'] }}</td>
                <td colspan="4" class="border text-center p-1 text-size12 sanserif" style="padding-top: 5px; padding-bottom: 5px;">{{$borrower['releasing']['account_number'] }}</td>
        
        </tr>
        <tr>
            <td colspan="4" class="border" style="height: 15px;"></td>
            <td colspan="4" class="border" style="height: 15px;"></td>
            <td colspan="4" class="border" style="height: 15px;"></td>
            <td colspan="4" class="border" style="height: 15px;"></td>
            <td colspan="4" class="border" style="height: 15px;"></td>
        </tr>
    </table>
 <div class="page-break"></div>
 <table style="width: 100%; border-collapse: collapse; border:1px solid #000 !important;">
    <tr style="background: #000; color:#fff; width:100%">
        <td colspan="12" style="padding-left:10px;" class="text-size14 text-center">BORROWER & CO-BORROWER UNDERTAKING</td>
    </tr>
    <tr style="width:100%;" style="border-bottom: none !important;">
        <td colspan="12" style="padding: 10px; border: none !important; padding-top: 5px !important;">
            <p class="text-size14 sanserif">
                I/We hereby certify that all the information furnished in this Loan Application Form (LAF) are true, correct and complete. I/We further certify that the
                signatures affixed herein are true and genuine. 
            </p>
            <p class="text-size14 sanserif">
                    I/We hereby authorize GSLI to obtain such information, as may be required, concerning the validity and veracity of the information provided in this
                    application. I/We agree that this LAF, all supporting documents and any other information obtained by GSLI relative to this application, shall remain as the
                    property of GSLI whether or not the loan is granted.
           </p>
           <p class="text-size14 sanserif">
            I/We agree that any false statement or concealment of information which may be discovered after the loan has been granted shall be sufficient basis for
            GDFI to consider the loan as due and demandable
           </p>
           <p  class="text-size14 sanserif">
            GSLI branches DO NOT accept cash payments. Payments of any kind must be settled directly at GSLI accredited payment centers. Please refer to GSLI's list of
            accredited payment centers. In case the loan has been denied, GSLI has no obligation to disclose the reason to the Borrower.
           </p>   
            <p class="text-size14 sanserif">  
            We further understand that a cooling-off period of three (3) business days shall be applied following the execution of this transaction. You may cancel this
            transaction without penalty; however, nothing herein prevents GSLI from recovering the processing costs incurred.
            </p>
         
    </td>
    </tr>
    
    <tr style="width:100%;" style="border-bottom: none !important;">
        <td colspan="12"  style="padding: 10px; border: none !important"> 
            <div class="relative" style="min-height: 120px;">
                <div class="absolute" style="position: absolute; top: 10px; left: 50px;">
                    <img src="{{ storage_path('storage/' . $borrower['personal_information']['requirements']['signature']) }}" alt="" width="150">
                    <p>{{ $borrower['personal_information']['lastname'] }} {{ $borrower['personal_information']['firstname'] }} {{ $borrower['personal_information']['middlename'] }}</p>
                    <p style="font-weight: 700;min-width:150px; border-top: 2px solid #212221;" class="text-center text-size14">Borrower</p>
                    <p class="text-center text-size14">(Signature over printed Name / Date )</p>
                </div>
                <div class="absolute" style="position: absolute; top: 10px; right: 50px;">
                    
                    <p style="font-weight: 700;min-width:150px; border-top: 2px solid #212221;" class="text-center text-size14">Co-Borrower</p>
                    <p class="text-center text-size14">(Signature over printed Name / Date )</p>
                </div>
            </div>
        </td>
    </tr>
    <tr style="border-bottom: 1px solid #000 !important;">
        <td colspan="12" class="text-size14 text-center" style="border-top: 1px solid #000; border-bottom 1px solid #000 !important;">
            DATA PRIVACY CONSENT FORM
        </td>
    </tr>
    <tr>
        <td colspan="12" style="padding: 10px; border: none !important border-top:1px solid #000 !important; padding-top: 5px !important;">
            <p class="text-size14 sanserif">
              The privacy and security of your personal data (“Personal Information”) that GSLI collects is important to us. It is equally important that you understand how
                GSLI handles this data. In conducting our business, we must collect your “Personal Information”. It will be strictly used to administer your account and to
                provide the products and services you have requested from us and to further meet your needs and the standard procedures of GSLI’s business.

            </p>
            <p class="text-size14 sanserif">
                We will treat your “Personal Information” as confidential data. It will only be disclosed, subject to our permission, to GSLI’s affiliates and partners such as
                credit bureaus, collection companies, and other financial institutions for the purpose of assisting you in your financial needs and for the effective handling of
                your account.
            </p>
            <p class="text-size14 sanserif">
                We will treat your “Personal Information” as confidential data. It will only be disclosed, subject to our permission, to GSLI’s affiliates and partners such as
                credit bureaus, collection companies, and other financial institutions for the purpose of assisting you in your financial needs and for the effective handling of
                your account.
            </p>
            <p class="text-size14 sanserif">
                For the proper assessment of your loan application, you hereby allow GSLI directly or through its partners, to collect, retrieve, process, use, and store your
                “Personal Information” such as name, age, photographs, mobile number/s, employment details, income, financial data, financial profile, credit standing,
                loan payment history, other means of positive identification such as photograph, signature, and/or such other identifiable features, and other information
                required in the application form for the purpose of reviewing and processing your loan application.
            </p>
            <p class="text-size14 sanserif">
                Further, you hereby give consent to the collection of your personal data from telecommunication companies, banks, credit bureaus, payment platforms,
                airlines, utility companies, suppliers, and employers for credit evaluation purposes. Furthermore, in case of restructuring your loan obligation, you are giving
                consent and allow GSLI to disclose and collect information from the above-mentioned institutions and people. Throughout the processing of the your
                “Personal Information”, your rights under the Data Privacy Act of 2012, such as the (1) right to be informed, (2) right to object, (3) right to access, (4) right to
                rectification, (5) right to erasure or blocking, and (6) right to damages, shall be upheld. For your complete rights as a data subject, please visit
                https://www.privacy.gov.ph/data-privacy-act/

            </p>
            <p class="text-size14 sanserif">
                GSLI affiliates and partners:
            </p>
            <p class="text-size14 sanserif">
                A. Collection Companies:
            </p>
            <p class="text-size14 sanserif" style="margin-left: 180px;">
                Annapolis Credit Management Services, Inc.
                <br>
                Executive Collection & Credit Management Services, Inc.
                <br>
                Eagle Eye Business & Collection Services, Inc.
                <br>
                Titan Collection & Credit Management, Inc.
                <br>
                Sparta Credit Management Services , Inc.
                <br>
                Supreme Collection Management Services, Inc.
            </p>
            <p class="text-size14 sanserif">
                B. Loan Specialist Accredited by GSLI
            </p>
        </td>
    </tr>
    <tr style="width:100%;" style="border-bottom: 1px solid #000 !important;">
        <td colspan="12"  style="padding: 10px; border: none !important"> 
            <div class="relative" style="min-height: 120px;">
                <div class="absolute" style="position: absolute; top: 10px; left: 50px;">
                    <img src="{{ public_path('storage/' . $borrower['personal_information']['requirements']['signature']) }}" alt="" width="150">
                    <p>{{ $borrower['personal_information']['lastname'] }} {{ $borrower['personal_information']['firstname'] }} {{ $borrower['personal_information']['middlename'] }}</p>
                    <p style="font-weight: 700;min-width:150px; border-top: 2px solid #212221;" class="text-center text-size14">Borrower</p>
                    <p class="text-center text-size14">(Signature over printed Name / Date )</p>
                </div>
                <div class="absolute" style="position: absolute; top: 10px; right: 50px;">
                    
                    <p style="font-weight: 700;min-width:150px; border-top: 2px solid #212221;" class="text-center text-size14">Co-Borrower</p>
                    <p class="text-center text-size14">(Signature over printed Name / Date )</p>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="12"   style="padding: 10px; border: none !important">
            <p class="text-size14 sanserif" ><strong>FOR GSLI USE ONLY:</strong></p>
            
            <p class="text-size14 sanserif">I certify that by exercising due diligence:</p>

            <ul class="custom-list" style="margin-left: 180px; padding-right: 30px">
                <li class="text-size14 sanserif">I have verified the information stated in this LAF against the documents submitted by the Borrower to be
                    true and correct;
                </li>
                <li class="text-size14 sanserif">I have collected all the required Know-Your-Client requirements from the Borrower and shall proceed
                    with the loan application process in compliance with GSLI's existing policies as of the loan application date; and</li>
                <li class="text-size14 sanserif">In case the original document of the Borrower is not available for verification, I will ensure that these are
                    presented for verification <strong style="text-decoration: underline">prior</strong> to the release of the loan proceeds</li>
              </ul>
        </td>
    </tr>
    <tr style="width:100%;" style="border-bottom: 1px solid #000 !important;">
        <td colspan="12"  style="padding: 10px; border: none !important"> 
            <div class="relative" style="min-height: 120px;">
                <div class="absolute" style="position: absolute; top: 10px; left: 50px;">
                    <p style="font-weight: 700;min-width:150px; border-top: 2px solid #212221;" class="text-center text-size14">Verified by: GSLI Officer/Associate</p>
                    <p class="text-center text-size14">(Signature over printed Name / Date )</p>
                </div>
                <div class="absolute" style="position: absolute; top: 10px; right: 50px;">
                    <p style="font-weight: 700;min-width:150px; border-top: 2px solid #212221;" class="text-center text-size14">Checked by: Branch Head</p>
                    <p class="text-center text-size14">(Signature over printed Name / Date )</p>
                </div>
            </div>
        </td>
    </tr>
 </table>

</body>

</html>
