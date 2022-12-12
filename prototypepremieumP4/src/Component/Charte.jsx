import { Bar } from "react-chartjs-2";
import { Chart as ChartJs } from "chart.js/auto";
import React from "react";
import axios from "axios";


class ChartBar extends React.Component{
    state={
        list:[]
    }

    componentDidMount=()=>{
        axios.get('http://127.0.0.1:8000/api/mytache').then(res=>{
            //console.log(res.data);
            this.setState({list:res.data});
            
        });
    }
    render(){
        return(
            <div style={{width:600}}>
                <Bar data={{
                    labels:this.state.list.map((value)=>value.nameT),
                    datasets:[{
                        label:'durée de tache(/h)',
                        //star d arkam dure pae default
                        data:this.state.list.map((value)=>value.Period),
                        backgroundcolor:["red"],
                        indexAxis:'x',
                    }],
                }}/>
            </div>
        )
    }
}
export default ChartBar ;