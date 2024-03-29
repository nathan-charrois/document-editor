import React from 'react';
import { Route, Link } from 'react-router-dom';
import { Container, Col, Nav, NavItem, NavLink, Row } from 'reactstrap';

import About from '../about';
import Documents from '../documents';

const App = () => (
  <Container>
    <Row>
      <Col>
        <main>
          <Route exact path="/" component={Documents} />
          <Route exact path="/about-us" component={About} />
        </main>
      </Col>
    </Row>
    <div className="debug-toolbar">
      <Row className="justify-content-center">
        <Col>
          <Nav>
            <NavItem>
              <NavLink tag={Link} to="/">Documents</NavLink>
            </NavItem>
            <NavItem>
              <NavLink tag={Link} to="/about-us">About</NavLink>
            </NavItem>
          </Nav>
        </Col>
      </Row>
    </div>
  </Container>
);

export default App;
