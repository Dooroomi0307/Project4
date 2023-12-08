import React, { useEffect, useState } from 'react';
import App from './App.css';

function Search() {
  const [data, setData] = useState([]);
  const [searchQuery, setSearchQuery] = useState('');
  const [typeFilter, setTypeFilter] = useState('');
  const [cityFilter, setCityFilter] = useState('');
  const [bedFilter, setBedFilter] = useState('');
  const [bathFilter, setBathFilter] = useState('');
  const [minPrice, setMinPrice] = useState('');
  const [maxPrice, setMaxPrice] = useState('');

  useEffect(() => {
    // Fetch properties table data
    fetch('http://localhost:8081/properties')
      .then(res => res.json())
      .then(data => setData(data))
      .catch(err => console.log(err));
  }, []);

  const handleSearch = event => {
    setSearchQuery(event.target.value);
  };

  const handleTypeFilterChange = event => {
    setTypeFilter(event.target.value);
  };

  const handleCityFilterChange = event => {
    setCityFilter(event.target.value);
  };

  const handleBedFilterChange = event => {
    setBedFilter(event.target.value);
  };

  const handleBathFilterChange = event => {
    setBathFilter(event.target.value);
  };

  const handleMinPriceChange = event => {
    setMinPrice(event.target.value);
  };

  const handleMaxPriceChange = event => {
    setMaxPrice(event.target.value);
  };

  const priceRangeMatch = property => {
    if (minPrice && maxPrice) {
      return property.price >= parseInt(minPrice) && property.price <= parseInt(maxPrice);
    }
    return true;
  };

  const filteredData = data.filter(property => {
    const nameMatch = property.name.toLowerCase().includes(searchQuery.toLowerCase());
    const typeMatch = !typeFilter || property.type.toLowerCase() === typeFilter.toLowerCase();
    const cityMatch = !cityFilter || property.city.toLowerCase() === cityFilter.toLowerCase();
    const bedMatch = !bedFilter || property.bed.toString() === bedFilter;
    const bathMatch = !bathFilter || property.bath.toString() === bathFilter;
    const priceMatch = priceRangeMatch(property);

    return nameMatch && typeMatch && cityMatch && bedMatch && bathMatch && priceMatch;
  });

  return (
    <body>
      <div className="container">
        <div className="filter">
        <input
            id="property-name"
            type="text"
            placeholder="Search by name"
            value={searchQuery}
            onChange={handleSearch}
          />

          <select onChange={handleTypeFilterChange}>
            <option value="">Filter by type</option>
            <option value="apartment">Apartment</option>
            <option value="townhouse">House</option>
            <option value="trailer">Trailer</option>
          </select>
          <select onChange={handleCityFilterChange}>
            <option value="">Filter by city</option>
            <option value="buford">Buford</option>
            <option value="auburn">Auburn</option>
            <option value="atlanta">Atlanta</option>
          </select>
          <select onChange={handleBedFilterChange}>
            <option value="">Filter by bed</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <select onChange={handleBathFilterChange}>
            <option value="">Filter by bath</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>

          <div className="range-container">
            <label htmlFor="priceRange">Filter by price:</label>
            <input
              type="range"
              id="priceRange_min"
              min="0"
              max="5000"
              step="100"
              value={minPrice}
              onChange={handleMinPriceChange}
            />
            <span>{minPrice}</span>
            <input
              type="range"
              id="priceRange_max"
              min="0"
              max="5000"
              step="100"
              value={maxPrice}
              onChange={handleMaxPriceChange}
            />
            <span>{maxPrice}</span>
          </div>
        
      </div>
        
        

      {/* Search Result */}
      <div className="result">
        <table className="result-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Location</th>
              <th>Type</th>
              <th>Bed</th>
              <th>Bath</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            {filteredData.map((property, i) => (
              <tr key={i}>
                <td>{property.name}</td>
                <td>{property.city}</td>
                <td>{property.type}</td>
                <td>{property.bed}</td>
                <td>{property.bath}</td>
                <td>{property.price}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
      
      </div>
    </body>
    
  );
}

export default Search;
