import React, { useState } from "react";

const ContactForm = ({ onSubmit }) => {
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [message, setMessage] = useState("");



    const handleSubmit = (e) => {
        e.preventDefault();

        // Envoi du formulaire par e-mail
        onSubmit({
            name,
            email,
            message,
        });
    };

    return (

        <form
            className="formContent"
            onSubmit={handleSubmit}
        >
            <h2>Contact Form</h2>
            <div className="fullNameForm">
                <div>
                    <label
                        className="formLabel"
                        htmlFor="firstName"
                    >First Name
                    </label>
                    <input
                        className="formControl"
                        type="text"
                        placeholder="first name"
                        value={name}
                        onChange={(e) => setName(e.target.value)}
                    />
                    </div>
                <div>
                    <label
                        className="formLabel"
                        htmlFor="lastName"
                    >Last Name
                    </label>
                    <input
                        className="formControl"
                        type="text"
                        placeholder="last name"
                        value={name}
                        onChange={(e) => setName(e.target.value)}
                    />
                </div>
            </div>
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
                onChange={(e) => setTitle(e.target.value)} />
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
