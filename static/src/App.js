import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';
import { BrowserRouter as Router, Route, Link } from 'react-router-dom';

const PEEPS = [
  { id: 0, name: 'Michelle', friends: [1, 2, 3] },
  { id: 1, name: 'Sean', friends: [0, 3] },
  { id: 2, name: 'Kim', friends: [0, 1, 3] },
  { id: 3, name: 'David', friends: [1, 2] }
];

const find = id => PEEPS.find(p => p.id == id);

const Person = ({ match }) => {
  const person = find(match.params.id);

  return (
    <div>
      <h3>{person.name}’s Friends</h3>
      <ul>
        {person.friends.map(id => (
          <li key={id}>
            <Link to={`${match.url}/${id}`}>{find(id).name}</Link>
          </li>
        ))}
      </ul>
      <Route path={`${match.url}/:id`} component={Person} />
    </div>
  );
};

class App extends Component {
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <h1 className="App-title">Welcome to React</h1>
        </header>
        <Router>
          <Person match={{ params: { id: 0 }, url: '' }} />
        </Router>
      </div>
    );
  }
}

export default App;
