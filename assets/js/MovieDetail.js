import React from "react";
import MovieComponent from "./MovieComponent";
import { Link } from "react-router-dom";

export default class MovieDetail extends React.Component {
  render() {
    return (
      <div>
        <Link to="/">Back to list</Link>
        <MovieComponent movie={this.props.movie} />
      </div>
    );
  }
}
