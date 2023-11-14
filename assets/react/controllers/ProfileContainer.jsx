import React, { useState, useEffect } from 'react';

const Test = require('../../images/test.png');

function ProfileContainer() {
  const [userData, setUserData] = useState(null);
  const [studentData, setStudentData] = useState(null);

  useEffect(() => {
    // Fetch user data from the database
    // Replace `fetchUserData` with the actual function to fetch user data
    fetchUserData()
      .then((data) => setUserData(data))
      .catch((error) => console.log(error));

    // Fetch student data from the database
    // Replace `fetchStudentData` with the actual function to fetch student data
    fetchStudentData()
      .then((data) => setStudentData(data))
      .catch((error) => console.log(error));
  }, []);

  // Replace `fetchUserData` with the actual function to fetch user data
  function fetchUserData() {
    // Implement code to fetch user data from the database
    return new Promise((resolve, reject) => {
      // Replace with the actual API endpoint or database query
      const endpoint = '/user';
      fetch(endpoint)
        .then((response) => response.json())
        .then((data) => resolve(data))
        .catch((error) => reject(error));
    });
  }

  // Replace `fetchStudentData` with the actual function to fetch student data
  function fetchStudentData() {
    // Implement code to fetch student data from the database
    return new Promise((resolve, reject) => {
      // Replace with the actual API endpoint or database query
      const endpoint = '/admin/student';
      fetch(endpoint)
        .then((response) => response.json())
        .then((data) => resolve(data))
        .catch((error) => reject(error));
    });
  }

  const userInformation = userData ? userData : {
    firstname: "John",
    lastname: "Doe",
    age: 25,
    nationality: "USA",
    email: "johndoe@example.com",
    language: "English"
  };



  return (
    <main>
      <div className="leftColumn">
        <ul className="aLeft">
          <li><a href="/sprofile">Profile</a></li>
          <li><a>Calendar</a></li>
          <li><a>Progress</a></li>
          <li><a>Mailbox</a></li>
          <li><a>Payment</a></li>
          <li><a>Edit Profile</a></li>
        </ul>
      </div>
      <div className="mainCtn">
        <h1>PROFILE</h1>
        <div className='profileContainer'>
          <div className="profileDescription">
            <div className="profileInfo">
              <h2>Information</h2>
              <div className="infoCtn">
                <ul>
                  <li><p>Firstname : {userInformation.firstname}</p></li>
                  <li><p>Last : {userInformation.lastname}</p></li>
                  <li><p>Age : {userInformation.age}</p></li>
                  <li><p>Nationality : {userInformation.nationality}</p></li>
                  <li><p>Email : {userInformation.email}</p></li>
                  <li><p>Language : {userInformation.language}</p></li>
                </ul>
              </div>
            </div>
            <div className="profilePhoto">
              <h2>Photo</h2>
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
      <div className="mainCtn">
        <h1>PROFILE</h1>
        <div className='profileContainer'>
          <div className="profileDescription">
            <div className="profileInfo">
              <h2>Information</h2>
              <div className="infoCtn">
                <ul>
                  <li><p>Firstname : {userInformation.firstname}</p></li>
                  <li><p>Last : {userInformation.lastname}</p></li>
                  <li><p>Age : {userInformation.age}</p></li>
                  <li><p>Nationality : {userInformation.nationality}</p></li>
                  <li><p>Email : {userInformation.email}</p></li>
                  <li><p>Language : {userInformation.language}</p></li>
                </ul>
              </div>
            </div>
            <div className="profilePhoto">
              <h2>Photo</h2>
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



export default ProfileContainer;
