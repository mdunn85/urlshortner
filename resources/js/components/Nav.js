import React, { Component } from 'react';

export default class Nav extends Component {
    render() {

        return (
            <nav className="navbar">
                <a className="navbar-brand mx-auto" href="#">
                    <img src="/images/logo.png" height="75" alt="logo"/>
                </a>
            </nav>
        )
    }
}
