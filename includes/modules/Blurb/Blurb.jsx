// External Dependencies
import React, { Component } from "react";

// Internal Dependencies
import "./style.css";

class NM_BLURB extends Component {
  static slug = "nm_divi_blurb";

  constructor(props) {
    super(props);
    this.state = { width: 0 };
    this.updateWindowDimensions = this.updateWindowDimensions.bind(this);
  }

  componentDidMount() {
    this.updateWindowDimensions();
    window.addEventListener("resize", this.updateWindowDimensions);
  }

  componentWillUnmount() {
    window.removeEventListener("resize", this.updateWindowDimensions);
  }

  updateWindowDimensions() {
    this.setState({ width: window.innerWidth });
  }

  static css(props) {
    const additionalCss = [];

    let title = this.props.nm_title;

  }

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

export default NM_BLURB;
