// External Dependencies
import React, { Component } from "react";

// Internal Dependencies
import "./style.css";

class NMDIVI_BLURB extends Component {
  static slug = "nmdivi_blurb";

  static css(props) {
    let additionalCss = [];

    additionalCss.push([
      {
        selector: "%%order_class%% .featured-box-title",
        declaration: `background-color: ${props.nm_title_bg} !important;`,
      },
    ]);

    additionalCss.push([
      {
        selector: "%%order_class%% .featured-box-content",
        declaration: `background-color: ${props.nm_content_bg} !important;`,
      },
    ]);

    console.log(props);

    return additionalCss;
  }

  // componentDidMount() {
  //   this.updateWindowDimensions();
  //   window.addEventListener("resize", this.updateWindowDimensions);
  // }

  // componentWillUnmount() {
  //   window.removeEventListener("resize", this.updateWindowDimensions);
  // }

  // updateWindowDimensions() {
  //   this.setState({ width: window.innerWidth });
  // }

  render() {
    const title = this.props.nm_title;
    // const Content = this.props.content();
    const content = this.props.nm_content;
    const img = this.props.nm_img;
    const btn_text = this.props.nm_btn;
    const btn_url = this.props.nm_btn_url;
    const btn_target =
      "on" === this.props.nm_btn_url_new_window ? "_blank" : "";

    return (
      <>
        <div className="featured-box featured-box-default">
          <div className="featured-box-image">
            <div className="image-mask">
              <img src={img} alt="Tree Plantation System" />
            </div>
          </div>
          <div className="featured-box-content">
            <h3 className="featured-box-title">
              <span>{title}</span>
            </h3>
            <div className="featured-box-text">{content}</div>
            <div className="featured-box-button">
              <a
                className="featured-box-readmore display-inline-block"
                href={btn_url}
                target={btn_target}
              >
                {btn_text}
              </a>
            </div>
          </div>
        </div>
      </>
    );
  }
}

export default NMDIVI_BLURB;
