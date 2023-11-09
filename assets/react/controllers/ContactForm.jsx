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

        <>
            <form
                className="formContent"
                onSubmit={handleSubmit}
            >
                <h2>Contact Form</h2>
                <label
                    className="formLabel"
                    htmlFor="nom"
                >Name
                </label>
                <input
                    className="formGroup formControl"
                    type="text"
                    placeholder="Name"
                    value={name}
                    onChange={(e) => setName(e.target.value)} />
                
                <label
                    className="formLabel"
                    htmlFor="email"
                >Email
                </label>
                <input
                    className="formGroup formControl"
                    type="email"
                    placeholder="E-mail"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)} />
                <label
                    className="formLabel"
                    htmlFor="message"
                >
                Message
                </label>
                <textarea
                    className="formGroup formControl"
                    placeholder="Message"
                    value={message}
                    onChange={(e) => setMessage(e.target.value)} />
                <button
                    className="sendBtn"
                    type="submit"
                >Send
                </button>
            </form>
        </>
    );
};

export default ContactForm;
