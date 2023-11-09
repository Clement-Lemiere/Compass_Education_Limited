import React from 'react';

const LanguageCard = ({ name, imageName, description }) => {
    return (
        <div>
            <h3>{name}</h3>
            <div><img src={imageName} alt="" /></div>
            <p>{description}</p>
            <div><a href="#">Choose</a></div>
        </div>
    );
}

export default LanguageCard;
