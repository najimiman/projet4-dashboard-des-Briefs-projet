import logo from './logo.svg';
import './App.css';
import React from 'react';
import Home from './home/Home';
import Login from './login/Login';
import { BrowserRouter,Routes,Route,Link } from 'react-router-dom';


class App extends React.Component{
  render(){
    return(
      <BrowserRouter>
      <div>
      <Link to='/'>Home</Link> {" "}
      <Link to='/Login'>Login</Link>
      <Routes>
      <Route path="/" exact element={<Home/>}/>
      <Route path="/Login"  element={<Login/>}/>
      </Routes>
        </div>
      </BrowserRouter>
    );
  }
}

export default App;
