import React from "react";
import { Route, Switch } from "react-router-dom";
import Header from "./Header";

function App() {
    return (
        <>
            <Header />
            <Switch>
                <Route path="/" exact>
                    <Allmeetup />
                </Route>
                <Route path="/new">
                    <Newmeet />
                </Route>
                <Route path="/fav">
                    <Fav />
                </Route>
                <Route path="/users/:email">
                    <Thismeet />
                </Route>
            </Switch>
        </>
    );
}
export default App;
