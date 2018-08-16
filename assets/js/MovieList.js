import React from "react";
import MovieComponent from "./MovieComponent";
import { Link } from "react-router-dom";

export default class Movies extends React.Component {
  render() {
    return this.props.movies.map(movie => (
      <Link to={`movie/${movie.slug}`} key={movie.slug}>
        <MovieComponent movie={movie} />
      </Link>
    ));
  }
}
