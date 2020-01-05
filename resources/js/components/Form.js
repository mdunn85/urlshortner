import React, {Component} from 'react';

export default class Form extends Component {
    render() {

        const apiUrl = "http://localhost:8080/";

        function onInput() {
            const long_url_input = document.getElementById('url');
            if (long_url_input.value.length > 0) {
                long_url_input.style.borderColor = "#ced4da";
            }
        }

        function handleClick(e) {
            e.preventDefault();
            const long_url_input = document.getElementById('url'),
                url_value = long_url_input.value
            if (url_value.length === 0) {
                document.getElementById('url').style.borderColor = "red";
            } else {
                const token = document.getElementById('csrf_token').getAttribute('content'),
                    data = {
                        "_token": token,
                        url: url_value
                    };

                fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        _token: token,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }).then((response) => {
                    return response.json()
                }).then(result => {
                    if (result.success) {
                        document.getElementById('short_url').value = apiUrl + result.short_url;
                    }
                });
            }
        }

        return (
            <form>
                <div className="form-group">
                    <div className="col">
                        <label htmlFor="url">Paste your long URL</label>
                        <input
                            className="form-control"
                            type="text"
                            name="url"
                            id="url"
                            placeholder="e.g. https://www.payasugym.com"
                            onInput={onInput}
                        />
                    </div>
                    <div className="col">
                        <button type="button" className="btn btn-primary mt-4" onClick={handleClick}>Generate</button>
                    </div>
                    <div className="col mt-3">
                        <label className="mt-2" htmlFor="short_url">Generated short URL</label>
                        <input
                            className="form-control"
                            type="text"
                            name="short_url"
                            id="short_url"
                            readOnly={true}
                        />
                    </div>
                </div>
            </form>
        )
    }
}
