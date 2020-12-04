/*
    Name: Dailee Howard
    Date: November 7th, 2020
    File: guestbook.js
*/

let meetingEventOther = document.getElementById("meetingEventOther");
meetingEventOther.addEventListener("click", addOther);

let mailingList = document.getElementById("mailingList");
mailingList.addEventListener("click", addEmailOptions);

let form = document.getElementById("guestbookform");
/*form.onsubmit = validate;*/

function addOther()
{
    let meetingEvent = document.getElementById("meetingEvent");
    let otherText = document.getElementById("otherText");

    otherText.style = "display: block;";
}

function addEmailOptions()
{
    let mailingList = document.getElementById("mailingList");
    let emailOptions = document.getElementById("emailOptions");

    if (mailingList.checked)
    {
        emailOptions.style = "display: block;";
    }
    else
    {
        emailOptions.style = "display: none";
    }
}

function clearErrors()
{
    let errors = document.getElementsByClassName("text-danger");
    for (let i=0; i<errors.length; i++)
    {
        errors[i].classList.add("d-none");
    }
}

function validate()
{
    clearErrors();

    let isValid = true;

    let firstName = document.getElementById("firstName").value;

    if (firstName.trim() == "")
    {
        let errFirstName = document.getElementById("err-firstName");
        errFirstName.classList.remove("d-none");
        isValid = false;
    }

    let lastName = document.getElementById("lastName").value;

    if (lastName.trim() == "")
    {
        let errLastName = document.getElementById("err-lastName");
        errLastName.classList.remove("d-none");
        isValid = false;
    }

    let email = document.getElementById("email").value;
    let mailingList = document.getElementById("mailingList");

    if (email.trim() != "" && !/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))
    {
        let errEmailInvalid = document.getElementById("err-email-invalid");
        errEmailInvalid.classList.remove("d-none");
        isValid = false;
    }

    else if (email.trim() == "" && mailingList.checked)
    {
        let errEmail = document.getElementById("err-email");
        errEmail.classList.remove("d-none");
        isValid = false;
    }

    let linkedIn = document.getElementById("linkedIn").value;

    if (linkedIn.trim() != "" && linkedIn.startsWith("http") && linkedIn.endsWith(".com"))
    {
        let errLinkedInInvalid = document.getElementById("err-linkedIn-invalid");
        errLinkedInInvalid.classList.remove("d-none");
        isValid = false;
    }

    let meetingEvent = document.getElementById("meetingEvent");

    if (meetingEvent.selectedIndex == 0)
    {
        let errMeetingEvent = document.getElementById("err-meetingEvent");
        errMeetingEvent.classList.remove("d-none");
        isValid = false;
    }

    return isValid;
}