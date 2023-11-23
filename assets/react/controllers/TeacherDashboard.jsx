import React, { useState, useEffect } from 'react';

const Test = require('../../images/test.png');

function TeacherDashboard() {

    useEffect(() => {
        fetchUserData()
            .then((data) => {
                // Mettez à jour les états avec les données de l'utilisateur
                setFirstname(data.firstname);
                setLastname(data.lastname);
                setBirthdate(data.birthdate);
                setNationality(data.nationality);
                setEmail(data.email);
                setLanguage(data.language);
            })
            .catch((error) => {
                console.log(error);
            });
    }, []);

    async function fetchUserData() {
        // Remplacez cet exemple avec le code pour récupérer les données de l'utilisateur
        try {
            const response = await fetch("/api/user");
            const data = await response.json();
            return data;
        } catch (error) {
            throw new Error(error);
        }
    }

    const userInformation = {
        firstname: "",
        lastname: "",
        age: "",
        nationality: "",
        email: "",
        language: ""
    };



    const navigation = [
        { name: 'Profile', href: '/tprofile' },
        { name: 'Formation', href: '/' },
        { name: 'Student List', href: '/' },
        { name: 'Calendar', href: '/' },
        { name: 'Mailbox', href: '/' },
        { name: 'Resources', href: '/' },
        { name: 'Edit Profile', href: '/editTprofile' },

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
                                <ul>
                                    <li><label>Firstname :</label><p>{userInformation.firstname}</p></li>
                                    <li><label>Lastname :</label><p> {userInformation.lastname}</p></li>
                                    <li><label>Age : </label><p>{userInformation.age}</p></li>
                                    <li><label>Nationality :</label><p> {userInformation.nationality}</p></li>
                                    <li><label>Email : </label><p>{userInformation.email}</p></li>
                                    <li><label>Language : </label><p>{userInformation.language}</p></li>
                                </ul>
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
                        <button className='profileBtn'><a href="/editTprofile">Edit Profile</a></button>
                    </div>
                </div>
            </div>
        </main>
    );
}

export default TeacherDashboard;