import React from "react";

class SearchBar extends React.Component{
    render(){
        return(
            <form className="pr-3" id="demo-2">
                <input type="search" placeholder="Rechercher" />
            </form>
        );
    }
}

export default SearchBar;