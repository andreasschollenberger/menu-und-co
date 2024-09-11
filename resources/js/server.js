const express = require('express');
const nodemailer = require('nodemailer');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

app.use(bodyParser.json());

app.post('/send-email', (req, res) => {
    const { vorname, nachname, email, nachricht } = req.body;

    const transporter = nodemailer.createTransport({
        service: 'menueundco',
        auth: {
            user: 'info@menueundco.ch',
            pass: '01052018Las90Regas'
        }
    });

    const mailOptions = {
        from: 'your-email@gmail.com',
        to: 'info@menueundco.ch',
        subject: 'Kontaktformular',
        text: `Vorname: ${vorname}\nNachname: ${nachname}\nEmail: ${email}\nNachricht: ${nachricht}`
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            return res.status(500).send(error.toString());
        }
        res.status(200).send('Email sent: ' + info.response);
    });
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}/`);
});