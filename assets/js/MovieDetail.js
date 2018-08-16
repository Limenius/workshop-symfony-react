import React from "react";
import MovieComponent from "./MovieComponent";
import { Link } from "react-router-dom";

export default class MovieDetail extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      movie:
        props.movie && props.match.params.slug == props.movie.slug
          ? props.movie
          : undefined
    };
  }

  componentDidMount() {
    if (!this.state.movie) {
      fetch(`/api/movies/${this.props.match.params.slug}`)
        .then(response => response.json())
        .then(movie =>
          this.setState({
            movie
          })
        );
    }
  }

  render() {
    if (!this.state.movie) {
      return "Loading...";
    }
    return (
      <div>
        <Link to="/">Back to list</Link>
        <MovieComponent movie={this.state.movie} />
      </div>
    );
  }
}
