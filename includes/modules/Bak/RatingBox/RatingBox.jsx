import React, { Component } from "react";
import utility from "../../../scripts/df_scripts/utilities";
// Internal Dependencies
import "./style.css";

class RatingBox extends Component {
  static slug = "difl_ratingbox";
  static css(props) {
    var additionalCss = [];

    console.log(props);

    return additionalCss;
  }

  render_rating_wrapper() {
    const props = this.props;
    const utils = window.ET_Builder.API.Utils;

    // Rating scale type
    let rating_scale_type =
      props.rating_scale_type !== "" ? parseInt(props.rating_scale_type) : 5;

    // Rating Value - active
    let rating_value_5 =
      props.rating_value_5 !== "" ? parseInt(props.rating_value_5) : 5;

    let rating_value_10 =
      props.rating_value_10 !== "" ? parseInt(props.rating_value_10) : 10;

    // rating_scale_type === 5
    //   ? (rating_value = rating_value)
    //   : (rating_value = rating_value * 2);

    // rating_value = rating_scale_type === 10 ? rating_value * 2 : rating_value;

    // Rating Value - Inactive
    // let rating_value_inactive = ""
    // if(rating_scale_type === 5 && rating_value_5 === 5){
    //   rating_value_inactive = 5 - rating_value_5
    // }

    let rating_value_inactive = "";
    rating_value_inactive =
      rating_scale_type === 5 && rating_value_5 === 5
        ? (rating_value_inactive = 5 - rating_value_5)
        : (rating_value_inactive = 10 - rating_value_10);

    // Get only Icon
    let icon =
      props.enable_rating === "on" && props.rating_active !== ""
        ? utils.processFontIcon(props.rating_active)
        : utils.processFontIcon("&#xe033;");

    // Set Rating Icon
    let rating_icon = "";

    // console.log(rating_value_inactive)

    if (rating_scale_type === 5) {
      rating_icon = Array.apply(null, { length: rating_value_5 }).map(
        (e, i) => (
          <span className={"et-pb-icon"} key={i}>
            {icon}
          </span>
        )
      );

    } else if (rating_scale_type === 10) {
      rating_icon = Array.apply(null, { length: rating_value_10 }).map(
        (e, i) => (
          <span className={"et-pb-icon"} key={i}>
            {icon}
          </span>
        )
      );


    } else {
      Array.apply(null, { length: 5 }).map((e, i) => (
        <span className={"et-pb-icon"} key={i}>
          {icon}
        </span>
      ));
    }

    // Get Rating Icon title
    let title =
      props.enable_title === "on" && props.title !== "" ? props.title : "";

    // Rating Icon wrapper
    let iconWrapper = <div className={"df-rating-icon"}>{rating_icon}</div>;

    // Title Wrapper
    let titleWrapper =
      props.enable_title === "on" && props.title !== "" ? (
        <div className={"df-rating-title"}>{title}</div>
      ) : (
        ""
      );

    return (
      <div className="df-rating-wrapper">
        {iconWrapper}
        {titleWrapper}
      </div>
    );
  }

  render_content() {
    const props = this.props;
    // const content = this.props.dynamic.content.hasValue  !== '' ? utility._renderDynamicContent(this.props, 'content') : ''
    let content =
      props.enable_content === "on" && props.content() !== ""
        ? props.content()
        : "";

    return <div className="df-rating-description">{content}</div>;
  }

  render() {
    return (
      <>
        {/* {console.log(this.props.dynamic)} */}

        <div className="df-rating-box-wrapper">
          {this.render_rating_wrapper()}
          {this.render_content()}
        </div>

        {/* <div className="df-rating-box-wrapper">
          <div className="df-rating-wrapper">
            <div className="df-rating-icon">{rating}</div>
            <div className="df-rating-title">{title}</div>
          </div>
          <div className="df-rating-description">{content}</div>
        </div> */}
      </>
    );
  }
}

export default RatingBox;
