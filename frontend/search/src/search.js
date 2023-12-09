import React, { useEffect, useState } from 'react';
import { Modal, Button } from 'react-bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
import PropertyDetails from './propertyDetails';
import Navbar from './navbar.js';
import './Search.css';
import { FaAngleRight } from "react-icons/fa";
import { FaRegHeart } from "react-icons/fa";
import { FiTrash2 } from "react-icons/fi";

function Search() {
  const [data, setData] = useState([]);
  const [searchQuery, setSearchQuery] = useState('');
  const [typeFilter, setTypeFilter] = useState('');
  const [cityFilter, setCityFilter] = useState('');
  const [bedFilter, setBedFilter] = useState('');
  const [bathFilter, setBathFilter] = useState('');
  const [minPrice, setMinPrice] = useState('');
  const [maxPrice, setMaxPrice] = useState('');
  const [selectedProperty, setSelectedProperty] = useState(null);
  const [wishlist, setWishlist] = useState([]);

  useEffect(() => {
    // Fetch properties table data
    fetch('http://localhost:8081/properties')
      .then((res) => res.json())
      .then((data) => setData(data))
      .catch((err) => console.log(err));
  }, []);

  //set event
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

  const priceRangeMatch = (property) => {
    if (minPrice && maxPrice) {
      return property.price >= parseInt(minPrice) && property.price <= parseInt(maxPrice);
    }
    return true;
  };

  const openPropertyDetails = (property) => {
    setSelectedProperty(property);
  };

  const filteredData = data.filter((property) => {
    const nameMatch = property.name.toLowerCase().includes(searchQuery.toLowerCase());
    const typeMatch = !typeFilter || property.type.toLowerCase() === typeFilter.toLowerCase();
    const cityMatch = !cityFilter || property.city.toLowerCase() === cityFilter.toLowerCase();
    const bedMatch = !bedFilter || property.bed.toString() === bedFilter;
    const bathMatch = !bathFilter || property.bath.toString() === bathFilter;
    const priceMatch = priceRangeMatch(property);

    return nameMatch && typeMatch && cityMatch && bedMatch && bathMatch && priceMatch;
  });

  const Wishlist = ({ properties, removeFromWishlist, openPropertyDetails }) => {
    return (
      <div className="wishlist">
        <h4><FaRegHeart /> Wishlist</h4>
        <ul>
          {properties.map((property, index) => (
            <li key={index} onClick={() => openPropertyDetails(property)}>
              {property.name}, {property.city}{' '}
              <button onClick={(e) => { e.stopPropagation(); removeFromWishlist(index); }}>
                <FiTrash2 />
              </button>
            </li>
          ))}
        </ul>
      </div>
    );
  };

  const openPropertyFromWishlist = (property) => {
    setSelectedProperty(property);
  };

  const addToWishlist = (property) => {
    const existsInWishlist = wishlist.some((item) => item.id === property.id);
    if (!existsInWishlist) {
      setWishlist([...wishlist, property]);
    } else {
      alert('This property is already in the wishlist.');
    }
  };

  const removeFromWishlist = (index) => {
    const updatedWishlist = wishlist.filter((_, i) => i !== index);
    setWishlist(updatedWishlist);
  };

  //Display
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
        
        <div className="sub-container">
          {/* Search Result */}
          <div className="result">
            <table className="result-table">
              <thead>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Type</th>
                  <th>Bed</th>
                  <th>Bath</th>
                  <th>Price(monthly)</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                {filteredData.map((property, i) => (
                  <tr key={i}>
                    <td><img src={`http://localhost:8081/${property.img}`}/></td>
                    <td>{property.name}</td>
                    <td>{property.city}</td>
                    <td>{property.type}</td>
                    <td>{property.bed}</td>
                    <td>{property.bath}</td>
                    <td>${property.price}</td>
                    <td>
                      <Button id="details-btn" onClick={() => openPropertyDetails(property)}>
                      <FaAngleRight />
                      </Button>
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>
        </div>
            <div className="wishlist-container">
              
            <Wishlist
              properties={wishlist}
              removeFromWishlist={removeFromWishlist}
              openPropertyDetails={openPropertyFromWishlist}
            />
            </div>

        <Modal show={!!selectedProperty} onHide={() => setSelectedProperty(null)}>
          <Modal.Header closeButton>
            <Modal.Title>Property Details</Modal.Title>
          </Modal.Header>
          <Modal.Body>
            {selectedProperty && (
              <div className="modal-container">
                <img id="modal-img" src={`http://localhost:8081/${selectedProperty.img}`}/>
                <h4>{selectedProperty.name}</h4>
                <p>City: {selectedProperty.city}</p>
                <p>Name: {selectedProperty.name}</p>
                <p>Location: {selectedProperty.city}</p>
                <p>Type: {selectedProperty.type}</p>
                <p>Bed: {selectedProperty.bed}</p>
                <p>Bath: {selectedProperty.bath}</p>
                <p>Price (monthly): ${selectedProperty.price}</p>
                  <Button id="wishlist-btn" onClick={() => addToWishlist(selectedProperty)}>
                    <FaRegHeart /> Wishlist
                  </Button>
              </div>
            )}
          </Modal.Body>
          <Modal.Footer>
            <Button id="close-btn" onClick={() => setSelectedProperty(null)}>
              Close
            </Button>
          </Modal.Footer>
        </Modal>
        </div>  
      </div>
        
    </body>
  );
}

export default Search;
