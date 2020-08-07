import React from "react";

class SearchBar extends React.Component{

    state = { search: ''};

    onChangeSearchText = (event) => {
        console.log(event.target.value);
        this.setState({search: event.target.value}); // event.target.value.toUpperCase()
    }

    render(){
        return(
            <form className="pr-3" id="demo-2">
                <input type="search" placeholder="Rechercher" value={this.state.search} onChange={this.onChangeSearchText}/>
            </form>
        );
    }
}

export default SearchBar;