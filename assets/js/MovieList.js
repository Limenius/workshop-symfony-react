import React from "react";
import MovieComponent from "./MovieComponent";

export default class Movies extends React.Component {
  render() {
    return this.props.movies.map(movie => (
      <MovieComponent key={movie.slug} movie={movie} />
    ));
  }
}
