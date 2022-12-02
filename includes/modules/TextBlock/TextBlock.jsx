// External Dependencies
import React, { Component } from "react";

// Internal Dependencies
import "./style.css";

class NM_TEXT_BLOCK extends Component {
  static slug = "nm_divi_text_block";

  render() {
    const Title = this.props.nm_title;
    const Content = this.props.content();

    return (
      <>
        <div className="nm_text_bloc">
          <h1>{Title}</h1>
          <p>{Content}</p>
        </div>
      </>
    );
  }
}

export default NM_TEXT_BLOCK;
