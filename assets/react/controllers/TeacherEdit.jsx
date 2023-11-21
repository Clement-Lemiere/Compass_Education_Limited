import React, { useState, useEffect } from 'react';

const Test = require('../../images/test.png');

function TeacherDashboard({ onSubmit }) {



    const navigation = [
        { name: 'Profile', href: '/tprofile' },
        { name: 'Calendar', href: '/' },
        { name: 'Progress', href: '/' },
        { name: 'Mailbox', href: '/' },
        { name: 'Payment', href: '/' },
        { name: 'Edit Profile', href: '/editTprofile' },

    ]

    const [firstname, setFirstname] = useState("");
    const [lastname, setLastname] = useState("");
    const [birthdate, setBirthdate] = useState("");
    const [nationality, setNationality] = useState("");
    const [email, setEmail] = useState("");
    const [language, setLanguage] = useState("");



    const handleSubmit = (e) => {
        e.preventDefault();

        // Envoi du formulaire par e-mail
        onSubmit({
            firstname,
            lastname,
            birthdate,
            nationality,
            email,
            language,
        });
    };
    function activeSubmit() {
        const form = document.getElementById("myForm");

        form.submit();
    }


    return (

        //_____________________________ PAGE CONTENT_______________________________________\\

        <main className='profilePage' >

            {/* LEFT COLUMN */}

            <div div className="leftColumn" >
                <ul className="aLeft">
                    {navigation.map((item) => (
                        <li>
                            <a
                                key={item.name}
                                href={item.href}
                                aria-current={item.current ? 'page' : undefined}
                            >
                                {item.name}
                            </a>
                        </li>
                    ))}
                </ul>
            </div>

            {/* MAIN CONTENT */}

            <div div className="mainCtn" >
                <h1>PROFILE</h1>
                <div className='profileContainer'>
                    <h2>Information</h2>
                    <div className="profileDescription">
                        <div className="profileInfo">
                            <div className="infoCtn">
                                <form action='form' onSubmit={handleSubmit} id='myForm'>
                                    <ul>
                                        <li>
                                            <label htmlFor="firstname">Firstname :</label>
                                            <input
                                                type="text"
                                                placeholder="Firstname"
                                                value={firstname}
                                                onChange={(e) => setFirstname(e.target.value)}
                                            />
                                        </li>
                                        <li><label htmlFor="lastname">Lastname :</label>
                                            <input
                                                type="text"
                                                placeholder="Lastname"
                                                value={lastname}
                                                onChange={(e) => setLastname(e.target.value)}
                                            />
                                        </li>
                                        <li>
                                            <label htmlFor="birthdate">Birthdate :</label>
                                            <input
                                                className='inputBirth'
                                                type="date"
                                                placeholder="birthdate"
                                                value={birthdate}
                                                onChange={(e) => setBirthdate(e.target.value)}
                                            />
                                        </li>
                                        <li>
                                            <label htmlFor="nationality">Nationality :</label>
                                            <input
                                                type="text"
                                                placeholder="Nationality"
                                                value={nationality}
                                                onChange={(e) => setNationality(e.target.value)}
                                            />
                                        </li>
                                        <li>
                                            <label htmlFor="email">Email :</label>
                                            <input
                                                placeholder="E-mail"
                                                value={email}
                                                onChange={(e) => setEmail(e.target.value)}
                                            />
                                        </li>
                                        <li><label htmlFor="language">Language :</label>
                                            <input
                                                type="text"
                                                placeholder="Language"
                                                value={language}
                                                onChange={(e) => setLanguage(e.target.value)}
                                            />
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <div className="profilePhoto">
                            <div className='photo'>
                                <img
                                    src={Test}
                                    alt="My Profile Picture"
                                />
                            </div>
                            <input className='inputChangePhoto' type="file" id="photo" name="photo" accept="image/*" />
                        </div>
                    </div>
                    <div>
                        <button onClick={activeSubmit} className='profileBtn'>Save change</button>
                    </div>
                </div>
            </div >
        </main >
    );
}

export default TeacherDashboard;