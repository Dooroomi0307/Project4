import React from 'react';

const detail = ({ property }) => {
  return (
    <div>
      <h2>Property Details</h2>
      {property && (
        <div>
          <p>Name: {property.name}</p>
          <p>Location: {property.city}</p>
          <p>Type: {property.type}</p>
          <p>Bed: {property.bed}</p>
          <p>Bath: {property.bath}</p>
          <p>Price: {property.price}</p>
          {/* Add more details as needed */}
        </div>
      )}
    </div>
  );
};

export default detail;