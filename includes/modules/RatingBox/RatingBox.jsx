import React, { Component } from "react";
import utility from "../../../scripts/df_scripts/utilities";
// Internal Dependencies
import "./style.css";

class RatingBox extends Component {
  static slug = "difl_ratingbox";
  static css(props) {
    var additionalCss = [];

    // Rating Display type
    if (
      typeof props.rating_display_type !== "undefined" &&
      props.rating_display_type === "inline"
    ) {
      additionalCss.push([
        {
          selector: `%%order_class%% .df-rating-wrapper`,
          declaration: `display: flex;`,
        },
      ]);
    }

    // Rating Placement
    if (
      props.rating_display_type === "inline" &&
      props.rating_placement_left_right === "right"
    ) {
      additionalCss.push([
        {
          selector: `%%order_class%% .df-rating-wrapper`,
          declaration: `flex-direction: unset; justify-content: flex-start;`,
        },
      ]);
    }

    if (
      props.rating_display_type === "inline" &&
      props.rating_placement_left_right === "right"
    ) {
      additionalCss.push([
        {
          selector: `%%order_class%% .df-rating-icon`,
          declaration: `order: 2;`,
        },
        {
          selector: `%%order_class%% .df-rating-title`,
          declaration: `order: 1;`,
        },
      ]);
    }

    if (
      props.rating_display_type === "block" &&
      props.rating_placement_up_down === "down"
    ) {
      additionalCss.push([
        {
          selector: `%%order_class%% .df-rating-wrapper`,
          declaration: `display: flex; flex-direction: column-reverse;`,
        },
      ]);
    }

    utility.df_process_bg({
      props: props,
      key: "rating_box_wrapper_bg",
      additionalCss: additionalCss,
      selector: "%%order_class%% .df-rating-box-wrapper",
    });

    utility.df_process_bg({
      props: props,
      key: "rating_box_bg",
      additionalCss: additionalCss,
      selector: "%%order_class%% .df-rating-wrapper",
    });

    utility.df_process_bg({
      props: props,
      key: "rating_bg",
      additionalCss: additionalCss,
      selector: "%%order_class%% .df-rating-icon",
    });

    utility.df_process_bg({
      props: props,
      key: "rating_title_bg",
      additionalCss: additionalCss,
      selector: "%%order_class%% .df-rating-title",
    });

    utility.df_process_bg({
      props: props,
      key: "rating_content_bg",
      additionalCss: additionalCss,
      selector: "%%order_class%% .df-rating-description",
    });


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
        : utils.processFontIcon("&#xe031;");

    // Set Rating Icon
    let rating_icon = [];
    let rating_active_class = "";

    if (rating_scale_type === 5) {
      for (let i = 1; i <= rating_scale_type; i++) {
        if (i <= rating_value_5) {
          rating_active_class = " df-rating-icon-fill";
        } else if (
          i === rating_value_5 + 1 &&
          typeof rating_value_5 !== "undefined" &&
          rating_value_5 !== "" &&
          rating_value_5 !== 0
        ) {
          rating_active_class = ` df-rating-icon-fill df-fill-${props.rating_value_5.substr(
            2,
            1
          )}`;
        } else {
          rating_active_class = " df-rating-icon-empty";
        }
        rating_icon.push(
          <span className={"et-pb-icon" + rating_active_class} key={i}>
            {icon}
          </span>
        );
      }
    } else if (rating_scale_type === 10) {
      for (let i = 1; i <= rating_scale_type; i++) {
        if (i <= rating_value_10) {
          rating_active_class = " df-rating-icon-fill";
        } else if (
          i === rating_value_10 + 1 &&
          typeof rating_value_10 !== "undefined" &&
          rating_value_10 !== "" &&
          rating_value_10 !== 0
        ) {
          rating_active_class = ` df-rating-icon-fill df-fill-${props.rating_value_10.substr(
            2,
            1
          )}`;
        } else {
          rating_active_class = " df-rating-icon-empty";
        }
        rating_icon.push(
          <span className={"et-pb-icon" + rating_active_class} key={i}>
            {icon}
          </span>
        );
      }
    } else {
      for (let i = 1; i <= 5; i++) {
        rating_icon.push(
          <span className={"et-pb-icon"} key={i}>
            {icon}
          </span>
        );
      }
    }

    // Clean
    // if (rating_scale_type === 5) {
    //   for (let i = 1; i <= rating_scale_type; i++) {
    //     if(i <= rating_value_5){
    //       rating_active_class = " df-rating-icon-fill"
    //     }else if(i === rating_value_5 + 1 && typeof rating_value_5 !== 'undefined' && rating_value_5 !== "" && rating_value_5 !==0){
    //       rating_active_class = ` df-rating-icon-fill df-fill-${(props.rating_value_5).substr(2, 1)}`
    //     }
    //     else{
    //       rating_active_class = " df-rating-icon-empty"
    //     }
    //     rating_icon.push(<span className={"et-pb-icon" + rating_active_class} key={i}> {icon} </span>)
    //   }
    // } else {
    //   for (let i = 1; i <= 5; i++) {
    //     rating_icon.push(<span className={"et-pb-icon"} key={i}> {icon} </span>)
    //   }
    // }

    // Show rating number/text
    let ratingNumber =
      typeof props.enable_rating_number !== "undefined" &&
      props.enable_rating_number === "on" ? (
        rating_scale_type === 5 ? (
          <span>{`( ${props.rating_value_5} / ${rating_scale_type} )`}</span>
        ) : (
          <span>{`( ${props.rating_value_10} / ${rating_scale_type} )`}</span>
        )
      ) : (
        ""
      );

    // Get Rating Icon title
    let title =
      props.enable_title === "on" && props.title !== "" ? props.title : "";

    // Rating Icon wrapper
    let iconWrapper = (
      <div className={"df-rating-icon"}>
        {rating_icon}
        {ratingNumber}
      </div>
    );

    // Title Wrapper
    let titleWrapper =
      props.enable_title === "on" && props.title !== "" ? (
        <div className={"df-rating-title"}>{title}</div>
      ) : (
        ""
      );

    // Return Rating Icon wrapper
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
