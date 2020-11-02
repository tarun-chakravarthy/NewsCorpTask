import React from 'react';
import './App.css';
function Form() {
    return (
        <div className="form">
            <form>
                <div className="input-fields">
                    <label>
                        Company Name: <input className="enter-input" type="text" name="name" />
                    </label>
                    <label>
                        Phone: <input type="text" className="enter-input" name="name" />
                    </label>
                    <button class="submit-button" type="submit"> Request a quote </button>
                </div>
            </form>
        </div>
    );
}

export default Form;