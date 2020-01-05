import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Form from "./components/Form";

class App extends Component {
    render() {
        return (
            <div id="container" className="container-fluid">
                <div className="row pt-5">
                    <div className="col-12 col-md-6">
                        <div className="col-10 offset-1 mt-5">
                            <div className="col">
                                <h1>Generate your short URL</h1>
                            </div>
                        </div>
                        <div className="col-10 offset-1 mt-5">
                            <Form/>
                        </div>
                    </div>
                    <div className="col image-background"/>
                </div>
            </div>
        )
    }
}

ReactDOM.render(<App/>, document.getElementById('app'))
