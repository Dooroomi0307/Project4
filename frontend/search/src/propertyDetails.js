import React from 'react';

function PropertyDetails({ property }) {
  // Use the 'property' object to display detailed information
  return (
    <div>
      <h2>{property.name}</h2>
      <p>Name: {property.name}</p>
      <p>Location: {property.city}</p>
      <p>Type: {property.type}</p>
      <p>Bed: {property.bed}</p>
      <p>Bath: {property.bath}</p>
      <p>Price: {property.price}</p>
    </div>
  );
}

export default PropertyDetails;

