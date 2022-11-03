function sendEmail(){
    Email.send({
        Host : "smtp.elasticemail.com",
        Username : "trullotjc@gmail.com",
        Password : "08953966E85199E63D26DE79F7CA6448C4EF",
        To : 'trullotjc@gmail.com',
        From : document.getElementById("email").value,
        Subject : "Trullo Contact",
        Body : "This is the message"
    }).then(
    message => alert(message)
    );
}