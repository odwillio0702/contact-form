const emailjs = require('emailjs');

const server = emailjs.server.connect({
    user: 'Odwillio0702', // Замените на ваш EmailJS User ID
    password: 'Qwertyuiop21100', // Замените на ваш EmailJS Password
    host: 'smtp.emailjs.com',
    ssl: true,
});

const sendEmail = (to, subject, message) => {
    server.send({
        text: message,
        from: 'contactformodwillio0702@gmail.com',
        to: to,
        subject: subject,
    }, function (err, message) {
        if (err) {
            console.error('Error sending email:', err);
        } else {
            console.log('Email sent:', message);
        }
    });
};
