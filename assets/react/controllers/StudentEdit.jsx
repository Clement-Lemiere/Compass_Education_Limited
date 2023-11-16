import React, { useState, useEffect } from 'react';

const Test = require('../../images/test.png');

function StudentDashboard() {

    const userInformation = {
        firstname: "",
        lastname: "",
        age: "" ,
        nationality: "",
        email: "",
        language: ""
    };

    const navigation = [
        { name: 'Profile', href: '/sprofile' },
        { name: 'Calendar', href: '/' },
        { name: 'Progress', href: '/' },
        { name: 'Mailbox', href: '/' },
        { name: 'Payment', href: '/' },
        { name: 'Edit Profile', href: '/editSprofile' },

    ]

    return (

        //_____________________________ PAGE CONTENT_______________________________________\\

        <main className='profilePage'>

            {/* LEFT COLUMN */}

            <div className="leftColumn">
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

            <div className="mainCtn">
                <h1>PROFILE</h1>
                <div className='profileContainer'>
                    <h2>Information</h2>
                    <div className="profileDescription">
                        <div className="profileInfo">
                            <div className="infoCtn">
                                <form action="submit">
                                    <ul>
                                        <li><label>Firstname :</label><input type="text" /></li>
                                        <li><label>Lastname :</label><input type="text" /></li>
                                        <li><label>Age :</label><input type="text" /></li>
                                        <li><label>Nationality :</label><input type="text" /></li>
                                        <li><label>Email :</label><input type="text" /></li>
                                        <li><label>Language :</label><input type="text" /></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <div className="profilePhoto">
                            <div className='photo'>
                                <img
                                    src={Test}
                                    alt="About us"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <button className='profileBtn'>Save change</button>
                    </div>
                </div>
            </div>
        </main>
    );
}

export default StudentDashboard;