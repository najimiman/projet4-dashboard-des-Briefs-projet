import React from 'react'
import ProgressBar from 'react-bootstrap/ProgressBar'

// import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"


export class AvencementGroup extends React.Component {
  constructor(props){
    super(props)
}
render() {
return (
  <div>GroupAv
     <div>
            <ProgressBar now={this.props.data} label={`${this.props.data}%`}/>
        </div>
  </div>
)
}
}

export default AvencementGroup