import React from "react";
import MovieComponent from "./MovieComponent";
import { Link } from "react-router-dom";

export default class Movies extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      movies: props.movies
    };
  }

  componentDidMount() {
    if (!this.state.movies) {
      fetch("/api/movies")
        .then(response => response.json())
        .then(movies =>
          this.setState({
            movies
          })
        );
    }
  }

  render() {
    if (!this.state.movies) {
      return "loading...";
    }

    return this.state.movies.map(movie => (
      <Link to={`movie/${movie.slug}`} key={movie.slug}>
        <MovieComponent movie={movie} />
      </Link>
    ));
  }
}
