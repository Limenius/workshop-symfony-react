import React from "react";
import MovieComponent from "./MovieComponent";

export default class MovieDetail extends React.Component {
  render() {
    return <MovieComponent movie={this.props.movie} />;
  }
}
