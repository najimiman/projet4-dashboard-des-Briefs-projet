import React from "react";
import axios from "axios";
import AvencementGroup from "./AvencementGroup";
import BriefAv from "./BriefAv";
import StudentAv from "./StudentAv";
class Home extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
        years : [],
        group : '',
        studentCount : '',
        valueSelect: '',
        brief_affs : [],
        briefs_av : [],
        group_av : '',
        name:''
        };
  }
  getDatayears = () => {
    axios.get("http://localhost:8000/api/group").then((res) => {
      this.setState({
        years : res.data
      });
    });
  };

//   lastYear = () => {
//     axios.get("http://localhost:8000/api/lastY").then((res) => {
//       this.setState({
//         lastY : res.data.year
//       });
//     });
//   };

   getData = (e) => {
    axios.get('http://localhost:8000/api/group/'+e.target.value).then((res) => {
      console.log(res.data);
      this.setState({
        group: res.data.group,
        name:res.data.group.Nom_groupe,
        studentCount: res.data.studentCount,
        brief_affs : res.data.brief_aff,
        briefs_av : res.data.briefs,
        group_av : res.data.group_av,
      });
    });
  };

  componentDidMount() {
    this.getDatayears()
    // this.lastYear()
  }
   
    render() {
        return (
            <div>
            hello Home
            <div>
        <div className="row">
          <div className="col-md-8">
            <h1>tableau de borde d'état d'avancement</h1>
          </div>
          <div className="col-md-4 selectY">
            <select onChange={this.getData} id="input">
              <option value="">Année</option>
              {this.state.years.map((item)=>(
                <option value={item.id} key={item.id}>{item.Annee_scolaire}</option>
              ))}
            </select>
          </div>

          <div className="row info">
            <div className="col-md-4">
              <img src="" alt="logo"></img>
              <span>{this.state.name}</span>
            </div>
            <div className="col-md-4 info">
              <p>{this.state.studentCount} apprenants</p>
            </div>
            <div className="col-md-4"></div>
          </div>
        </div>

        <div className="row etatAv">
            <div className="col-md-6">
                <AvencementGroup data={this.state.group_av}/>
                <BriefAv data={this.state.briefs_av} />
            </div>
            <div className="col-md-6 etatAvSt">
                <StudentAv data={this.state.brief_affs}/>
            </div>
        </div>
      </div>
        </div>
        );
    }
}
export default Home;