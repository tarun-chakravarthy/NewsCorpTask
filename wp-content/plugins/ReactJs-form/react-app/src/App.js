import React from 'react';
import './App.css';
import Form from './Form'
import Gallery from './Gallery';

function App() {
  return (
    <div className="App">
      <header className="App-header">
      </header>
      <section className="gallery-section">
        <Gallery />
      </section>
      <div>
        <Form />
      </div>
    </div>
  );
}

export default App;
