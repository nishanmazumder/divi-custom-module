import React, { Component } from "react";
import utility from "../../../scripts/df_scripts/utilities";
// Internal Dependencies
import "./style.css";

class RatingBox extends Component {
  static slug = "difl_ratingbox";
  static css(props) {
    var additionalCss = [];


    console.log(props)

    return additionalCss
  }

  render() {
    const rating = this.props.rating;
    const title = this.props.title;
    const content = this.props.content;

    return (
      <>
        <div className="df-rating-box-wrapper">
          <div className="df-rating-wrapper">
            <div className="df-rating-icon">{rating}</div>
            <div className="df-rating-title">{title}</div>
          </div>
          <div className="df-rating-description">{content}</div>
        </div>
      </>
    );
  }
}

export default RatingBox;
