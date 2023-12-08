import React, { useState, useEffect } from 'react';

const TableComponent = () => {
  const [data, setData] = useState([]);

  useEffect(() => {
    // Fetch data from the API (replace 'YOUR_API_URL' with your actual API endpoint)
    fetch('YOUR_API_URL')
      .then(response => response.json())
      .then(data => setData(data))
      .catch(error => console.error('Error fetching data:', error));
  }, []);

  return (
    <div>
      <h1>MySQL Data Table</h1>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            {/* Add more table headers based on your data */}
          </tr>
        </thead>
        <tbody>
          {data.map(item => (
            <tr key={item.id}>
              <td>{item.id}</td>
              <td>{item.name}</td>
              <td>{item.email}</td>
              {/* Render additional columns based on your data */}
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default TableComponent;
