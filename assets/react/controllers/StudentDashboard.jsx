import React, { useState, useEffect } from 'react';

const Test = require('../../images/test.png');

function StudentDashboard() {

  const userInformation = {
    firstname: "John",
    lastname: "Doe",
    age: 25,
    nationality: "USA",
    email: "johndoe@example.com",
    language: "English"
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
            <button className='profileBtn'>Edit Profile</button>
          </div>
        </div>
      </div>
    </main>
  );
}

export default StudentDashboard;
