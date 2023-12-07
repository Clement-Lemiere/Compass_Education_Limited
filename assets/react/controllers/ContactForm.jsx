import React, { useState } from "react";

const ContactForm = ({ onSubmit }) => {
    const [firstName, setFirstName] = useState("");
    const [lastName, setLastName] = useState("");
    const [email, setEmail] = useState("");
    const [message, setMessage] = useState("");
    const [subject, setSubject] = useState("");



    const handleSubmit = (e) => {
        e.preventDefault();

        // Envoi du formulaire par e-mail
        onSubmit({
            firstName,
            lastName,
            email,
            subject,
            message,
        });
    };

    return (

        <form
            className="formContent"
            onSubmit={handleSubmit}
        >
            <h2>Contact Form</h2>
            
            <label
                className="formLabel fullNameLabel"
                htmlFor="firstName"
            >First Name
            </label>
            <label
                className="formLabel fullNameLabel"
                htmlFor="lastName"
            >Last Name
            </label>
            <input
                className="formControl fullNameInput"
                type="text"
                placeholder="first name"
                value={firstName}
                onChange={(e) => setFirstName(e.target.value)}
            />
            <input
                className="formControl fullNameInput"
                type="text"
                placeholder="last name"
                value={lastName}
                onChange={(e) => setLastName(e.target.value)}
            />
            <label
                className="formLabel"
                htmlFor="email"
            >Email
            </label>
            <input
                className="formControl"
                type="email"
                placeholder="E-mail"
                value={email}
                onChange={(e) => setEmail(e.target.value)} />
            <label
                className="formLabel"
                htmlFor="title"
            >Subject
            </label>
            <input
                className="formControl"
                type="text"
                placeholder="Subject"
                value={subject}
                onChange={(e) => setSubject(e.target.value)} />
            <label
                className="formLabel"
                htmlFor="message"
            >
            Message
            </label>
            <textarea
                className="formControl"
                placeholder="Message"
                value={message}
                onChange={(e) => setMessage(e.target.value)} />
            <button
                className="sendBtn"
                type="submit"
            >Send
            </button>
        </form>
    );
};

export default ContactForm;
