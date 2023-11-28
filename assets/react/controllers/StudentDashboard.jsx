import React, { useState, useEffect } from 'react';
import Test from '../../images/test.png';

function StudentDashboard() {
  const [user, setCurrentUser] = useState({});

  useEffect(() => {
    const apiUrl = 'https://localhost:8000/api/me';
    fetchUserData(apiUrl);
  }, []);

  const fetchUserData = async (apiUrl) => {
    try {
      const response = await fetch(apiUrl);
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      const userData = await response.json();
      setCurrentUser(userData);
    } catch (error) {
      console.error('Error fetching user data:', error);
    }
  };
  
  const formatBirthdate = (birthdateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const birthdate = new Date(birthdateString);
    return birthdate.toLocaleDateString('en-UK', options);
  };

  const navigation = [
    { name: 'Profile', href: '/sprofile' },
    { name: 'Calendar', href: '/scalendar' },
    { name: 'Progress', href: '/sprogress' },
    { name: 'Edit Profile', href: '/editSprofile' },
  ];

  const renderNavigation = () => (
    <ul className="aLeft">
      {navigation.map((item) => (
        <li key={item.name}>
          <a
            href={item.href}
            aria-current={item.current ? 'page' : undefined}
          >
            {item.name}
          </a>
        </li>
      ))}
    </ul>
  );

  const renderProfileInfo = () => {
    if (user.student) {
      return (
        <>
          <li><label>Firstname :</label><p>{user.student.firstName}</p></li>
          <li><label>Lastname :</label><p> {user.student.lastName}</p></li>
          <li><label>Birthdate : </label><p>{formatBirthdate(user.student?.birthdate)}</p></li>
          <li><label>Nationality :</label><p> {user.student.nationality}</p></li>
          <li><label>Level : </label><p>{user.student.level}</p></li>
          {/* Add more information as needed */}
        </>
      );
    }
    return null;
  };

  return (
    <main className='profilePage'>
      {/* LEFT COLUMN */}
      <div className="leftColumn">
        {renderNavigation()}
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
                  {renderProfileInfo()}
                  <li><label>Email : </label><p>{user.email}</p></li>
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
            <button className='profileBtn'><a href="/editSprofile">Edit Profile</a></button>
          </div>
        </div>
      </div>
    </main>
  );
}

export default StudentDashboard;