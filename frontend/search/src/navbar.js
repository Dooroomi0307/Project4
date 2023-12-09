import React from 'react';

function navbar() {
  return (
    <div className="navbar">
      <div className="logo">
        <li><a href="./home.php">Comp Homes.</a></li>
      </div>
      <ul className="links">
        <li><a href="./about.php">About</a></li>
        <li><a href="./services.php">Services</a></li>
        <li><a href="./staff.php">Our Staff</a></li>
        <li><a href="./register.php">Sign-up</a></li>
      </ul>
    </div>
  );
}

export default navbar;
