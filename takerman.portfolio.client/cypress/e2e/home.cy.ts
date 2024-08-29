// https://docs.cypress.io/api/introduction/api.html

describe("Homepage Test", () => {

  it('successfully loads', () => {
    cy.visit('/');
    cy.url().should('include', '/');
  });

  it("has elements on the page", () => {
    cy.visit('/');
    cy.get('#hero').should('exist');
    cy.get('#about').should('exist');
    cy.get('#skills').should('exist');
    cy.get('#services').should('exist');
    cy.get('#contact').should('exist');
  });
});
