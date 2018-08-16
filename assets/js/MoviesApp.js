import React from "react";
import { BrowserRouter, StaticRouter, Route } from "react-router-dom";
import MovieDetail from "./MovieDetail";
import MovieList from "./MovieList";
import Helmet from "react-helmet";
import { renderToString } from "react-dom/server";

const MainApp = initialProps => (
  <div>
    <Route
      path={"/movie/:slug"}
      render={props => <MovieDetail {...props} {...initialProps} />}
    />
    <Route
      path={"/"}
      exact
      render={props => <MovieList {...props} {...initialProps} />}
    />
  </div>
);

export default (initialProps, context) => {
  if (context.serverSide) {
    return {
      renderedHtml: {
        componentHtml: renderToString(
          <StaticRouter
            basename={context.base}
            location={context.location}
            context={{}}
          >
            <MainApp {...initialProps} />
          </StaticRouter>
        ),
        title: Helmet.renderStatic().title.toString()
      }
    };
  } else {
    return (
      <BrowserRouter basename={context.base}>
        <MainApp {...initialProps} />
      </BrowserRouter>
    );
  }
};
