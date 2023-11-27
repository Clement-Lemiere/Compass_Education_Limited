import React, { useState, useEffect } from 'react';

const Test = require('../../images/test.png');

function StudentDashboard() {

  const [users, setUsers] = useState([]);

  useEffect(() => {
    const apiUrl = 'https://localhost:8000/api/users/';
    fetchUserData(apiUrl);
  }, []);

  const fetchUserData = async (apiUrl) => {
    try {
      const response = await fetch(apiUrl);
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      const userData = await response.json();
      setUsers(userData['hydra:member']);

    } catch (error) {
      console.error('Error fetching user data:', error);
    }
  };

  const navigation = [
    { name: 'Profile', href: '/sprofile' },
    { name: 'Calendar', href: '/scalendar' },
    { name: 'Progress', href: '/sprogress' },
    // { name: 'Mailbox', href: '/' },
    // { name: 'Payment', href: '/' },
    { name: 'Edit Profile', href: '/editSprofile' },
  ];

  const formatBirthdate = (birthdateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const birthdate = new Date(birthdateString);
    return birthdate.toLocaleDateString('en-US', options);
  };

  return (
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
              {users.map((user) => (
                <div className="infoCtn">
                  <ul>
                    <li><label>Email : </label><p>{user.email}</p></li>
                    {user.student && (
                      <div>
                        <li><label>Firstname :</label><p>{user.student.firstName}</p></li>
                        <li><label>Lastname :</label><p> {user.student.lastName}</p></li>
                        <li><label>Birthdate : </label><p>{formatBirthdate(user.student?.birthdate)}</p></li>
                        <li><label>Nationality :</label><p> {user.student.nationality}</p></li>
                        <li><label>Level : </label><p>{user.student.level}</p></li>
                        {/* Ajoute d'autres détails d'étudiant si nécessaire */}
                      </div>
                    )}
                  </ul>
                </div>
              ))}
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
            <button className='profileBtn'><a href="/editSprofile">Edit Profile</a></button>
          </div>
        </div>
      </div>
    </main>
  );
}

export default StudentDashboard;

