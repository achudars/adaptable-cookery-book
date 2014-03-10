DROP TABLE recipe_step_ingredient;
DROP TABLE recipe_segmented_ingredient;
DROP TABLE recipe_ingredient;
DROP TABLE recipe_step;
DROP TABLE recipe_segmented;
DROP TABLE recipe;
DROP TABLE course;

CREATE TABLE `course` (
  `courseid` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`courseid`))
  CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `recipe` (
  `recipeid` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `narrative` TEXT NOT NULL,
  `courseid` INT NULL,
  `diettype` ENUM('Vegetarian', 'Vegan', 'Celiac') NULL,
  `serves` INT NOT NULL,
  `imageurl` VARCHAR(200) NULL,
  `calories` INT NOT NULL,
  `preptime` INT NOT NULL,
  PRIMARY KEY (`recipeid`),
  CONSTRAINT `fkey_recipe_courseid`
    FOREIGN KEY (`courseid`)
    REFERENCES `course` (`courseid`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
  CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `recipe_ingredient` (
  `recipeingredientid` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `quantity` DECIMAL(5,2) NULL,
  `section` VARCHAR(45) NULL,
  `units` VARCHAR(15) NULL,
  `recipeid` INT NOT NULL,
  PRIMARY KEY (`recipeingredientid`),
  CONSTRAINT `fkey_recipe_ingredient_recipeid`
    FOREIGN KEY (`recipeid`)
    REFERENCES `recipe` (`recipeid`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
  CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `recipe_segmented` (
  `recipeid` INT NOT NULL,
  `stepid` INT NOT NULL,
  `instruction` TEXT NOT NULL,
  PRIMARY KEY (`recipeid`, `stepid`),
  CONSTRAINT `fkey_recipe_segmented_recipeid`
    FOREIGN KEY (`recipeid`)
    REFERENCES `recipe` (`recipeid`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
  CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `recipe_step` (
  `recipeid` INT NOT NULL,
  `stepid` INT NOT NULL,
  `instruction` TEXT NOT NULL,
  PRIMARY KEY (`recipeid`, `stepid`),
  CONSTRAINT `fkey_recipe_step_recipeid`
    FOREIGN KEY (`recipeid`)
    REFERENCES `recipe` (`recipeid`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
  CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `recipe_segmented_ingredient` (
  `recipeingredientid` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `quantity` DECIMAL(5,2) NULL,
  `section` VARCHAR(45) NULL,
  `units` VARCHAR(15) NULL,
  `recipeid` INT NOT NULL,
  `replaces` INT,
  PRIMARY KEY (`recipeingredientid`),
  CONSTRAINT `fkey_recipe_segmented_ingredient_recipeid`
    FOREIGN KEY (`recipeid`)
    REFERENCES `recipe` (`recipeid`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fkey_recipe_segmented_ingredient_replaces`
    FOREIGN KEY (`replaces`)
    REFERENCES `recipe_ingredient` (`recipeingredientid`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
  CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `recipe_step_ingredient` (
  `recipeingredientid` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `quantity` DECIMAL(5,2) NULL,
  `section` VARCHAR(45) NULL,
  `units` VARCHAR(15) NULL,
  `recipeid` INT NOT NULL,
  `replaces` INT,
  PRIMARY KEY (`recipeingredientid`),
  CONSTRAINT `fkey_recipe_step_ingredient_recipeid`
    FOREIGN KEY (`recipeid`)
    REFERENCES `recipe` (`recipeid`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fkey_recipe_step_ingredient_replaces`
    FOREIGN KEY (`replaces`)
    REFERENCES `recipe_ingredient` (`recipeingredientid`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
  CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO `course` (`name`, `description`) VALUES
	('Main Dish', 'In here you can find all the main courses you could ever dream of eating.'),
	('Salad', 'Fancy something quick, simple and healthy? A good salad is the perfect choice!'),
	('Side Dish', 'Want a littls something more to go with your burgers? Why not take a look at all of the sides you can make.'),
	('Dessert', 'This is my favourite meal too!');

INSERT INTO `recipe`
	(`name`, `narrative`, `courseid`, `diettype`, `serves`, `imageurl`, `calories`, `preptime`)
	VALUES
	('Beef Burgers', '<p>Peel and finely instructions grate the onion and peel and crush the garlic. Finely chop the white part of the lemongrass, then place with the chicken, onion, breadcrumbs, garlic, coriander, lime zest, fish sauce and sugar in a large bowl and mix well with your hands. Shape into 2 patties, cover and chill for at least 10 minutes.</p>
	<p>Heat a barbecue or griddle pan until hot. Brush the burgers with a little oil and cook for 4 minutes on each side or until cooked through. Serve the burgers in soft rolls with lettuce, mint, coriander and chilli sauce.</p>', 1, NULL, 2, 'http://bit.ly/1fayFnt', 240, 30),
	('Quiche Maritime', '<p>Preheat the oven to 350 degrees F. Marinate the sliced tomatoes in French Dressing so they are fully coated. Take the smoked fish fillets and cut them into pieces 2-3 inches long. Place all into a small baking dish and add milk.  Bake for 20 minutes or until fish separates into flakes with a fork.</p>
	<p>Drain and reserve ¾ cup of liquid for later.</p>
	<p>Grease a pie plate and make a crust combining the rice, melted butter and 1 egg.  Turn the crust into the pie plate evenly.</p>
	<p>Sprinkle the pie crust with half of the shredded Cheddar Cheese and then add slices of fish.  Then, sprinkle the other half of the cheese.  Combined the reserved poaching liquid with 2 eggs and pour into pie plate.  Back for 30 min.  Remove from oven and arrange the tomatoes around the edge, skin up.  Bake for 10 more minutes until set.  Garnish with chopped green onions or chives.</p>', 1, NULL, 4, 'http://bit.ly/1dBViQE', 666, 60),
	('Tourtère', '<p>Cook over low heat in a large saucepan, stirring constantly until meat loses its red colour and about half of the liquid has evaporated. Cover and cook about 45 minutes longer.</p>
	<p>Boil and mash potatoes and mix in with the meat and allow to cool. Preheat oven to 450 degrees F. Prepare psatry for 2-crust, 9 inch pie. Roll out half and line a 9-inch pie plate. Fill with cooled meat mixture. Roll out remainder of dough and cover pie. Flute and seal edges. Slash top of crust. Bake for 10 min and reduce heat to 350 degrees F and bake for 30-40 minutes.</p>', 1, NULL, 4, 'http://bit.ly/1lI8Kr4', 300, 120),
	('Potato, bean and tomato salad with gremolata', '<p>Cook the potatoes in a large pan of lightly salted boiling water for 10-12 minutes or until just tender. Add the runner beans and cook for a further 2 minutes. Then drain and rinse under cold running water. Toss the potatoes and beans with the mixed tomatoes, salad onions and spinach and season to taste. For the gremolata, use a vegetable peeler to pare thin strips of rind from the lemon. Carefully remove as much white pith as possible (this is bitter). Finely chop the lemon rind and toss with the garlic and parsley. Season and set aside. Squeeze the juice from the lemon and whizz in a food processor with the peeled tomato and pesto for 10-15 seconds. Pour over the potato mixture and toss through. Scatter over the gremolata to serve.</p>', 2, 'Vegetarian', 4, 'http://bit.ly/1imhEKe', 120, 20),
	('Black Bean Dip', '<p>Soak the black beans in cold water overnight. Drain and rinse well. Put them in a large saucepan with plenty of water and bring to the boil. Cook for 25-30 minute, until soft to the bite. Drain well and set aside.</p>
	<p>Heat the oil in a saucepan set over high heat and add the red pepper and onion. Reduce the heat to low, cover and cook for about 8 minutes. Add the cumin, garlic and chillies and cook for a further 2 minutes. Add the beans, tomatoes, vinegar and passata and bring to the boil. Reduce the heat and simmer rapidly for 10 minutes, until almost all the liquid has evaporated and the tomatoes start to look mushy.</p>
	<p>Preheat the grill to high.</p>
	<p>Transfer the bean mixture to a flameproof dish and sprinkle the crumbled feta over the top. Cook under the hot grill until the cheese is soft and just starting to brown. Serve hot with corn chips on the side for dipping.</p>', 3, 'Vegetarian', 4, 'http://bit.ly/1imhnXJ', 150, 45),
	('Vanilla Slice', "<p>Set the oven to heat to a temperature of 240°C or 220°C with a fan assisted oven. Grease a 23cm square, deep edged, cake pan. Then line it with foil taking care to ensure the foil extends a minimum of 10cm over the edges.</p>
	<p>Then grease two other oven trays to place (and bake) the ready-rolled pastry. Bake for approximately fifteen minutes and then cool. Gently flatten the sheets of pastry by hand.</p>
	<p>Once done measure and trim the sheets to fit into the square cake pan. Place one of the sheets in the bottom of the cake pan pressing down gently.</p>
	<p>At this point one mixes together the sugar, cornflour, and custard powder in a saucepan. Slowly add the milk till smooth and combined, without any lumps. Turn on the hob burner to medium high and set the saucepan on top. Add in the butter and stir as it melts and the mixture comes to a boil.</p>
	<p>Continue to stir as it thickens, this usually takes around three minutes to attain a good thick consistency.</p>
	<p>Now take it off the heat and stir in the egg yolk and vanilla extract, making sure to mix well and quickly. You can then cover it with cling film and set aside to cool down to room temperature.</p>
	<p>Taking out a small saucepan and a heatproof bowl, set up a \'water bath\' on the hob by filling the saucepan 3/4 full with water and setting it to simmer (low boil). Pop the bowl on top in a lid-like capacity and then pop in the icing sugar, butter and passion fruit pulp from the icing list. Stir that all together over the simmering water until it melts together into a smooth pourable icing. Set aside.</p>
	<p>In another bowl whip the thickened cream, with a hand mixer, until it forms stif peaks. Then gently fold half of the cream into the custard mixture at a time, using gentle motions and a rounded implement to reduce the number of bubbles in the cream that break.</p>
	<p>Once all the whipped cream has been combined carefully then spread the mixture out over the puff pastry in the cake pan. Take care to make it as smooth as possible as you don\'t want air pockets under the top layer of pastry. When your happy with that, gently place the second measured slice of puff pastry on top, pressing down a bit to \'seat\' the pastry into the custard.</p>
	<p>Pour the icing on top, spreading gently so as not to disturbed what ever flakiness the top pastry has. Cover and cool for a minimum of three hours or overnight.</p>", 4, 'Vegetarian', 16, 'http://bit.ly/1ggG7cW', 300, 150);

INSERT INTO `recipe_ingredient` (`name`, `quantity`, `section`, `units`, `recipeid`)
	VALUES
	('small onion', 1, NULL, NULL, 1),
	('garlic clove', 1, NULL, NULL, 1),
	('small lemongrass stalk', 1, NULL, NULL, 1),
	('minced chicken', 200, NULL, 'g', 1),
	('fresh white breadcrumbs', 30, NULL, 'g', 1),
	('chopped fresh coriander', 1, NULL, 'tbsp', 1),
	('finely grated lime zest', 1, NULL, 'tsp', 1),
	('fish sauce', 1, NULL, 'tsp', 1),
	('caster sugar', 1, NULL, 'tsp', 1),
	('light flavoured oil, such as rapeseed, for brushing', NULL, NULL, NULL, 1),
	('medium tomatoes sliced and marinated in French Dressing', 2, NULL, NULL, 2),
	('smoke fish fillets', 1, NULL, 'pound', 2),
	('milk', 1, NULL, 'cup', 2),
	('cooked rise', 3, NULL, 'cup', 2),
	('butter, melted', 2, NULL, 'tbsp', 2),
	('eggs beaten', 3, NULL, NULL, 2),
	('grated Canadian Cheddar', 1, NULL, 'cup', 2),
	('ground lean pork', 1.5, NULL, 'pound', 3),
	('small onion minced', 1, NULL, NULL, 3),
	('boiling water', 0.5, NULL, 'cup', 3),
	('garlic clove, chopped', 1, NULL, NULL, 3),
	('salt', 1.5, NULL, 'tsp', 3),
	('celery salt', 0.25, NULL, 'tsp', 3),
	('black pepper', 0.25, NULL, 'tsp', 3),
	('sage', 0.25, NULL, 'tsp', 3),
	('ground cloves', NULL, NULL, 'pinch', 3),
	('small new potatoes, scrubbed, cut into bite-sized pieces if necessary', 225, 'Potato Salad', 'g', 4),
	('runner beans, cut diagonally into slices', 100, 'Potato Salad', 'g', 4),
	('ripe mixed tomatoes, (e.g. plum tomatoes, quartered lengthways; yellow and red cherry tomatoes, halved; beefsteak tomatoes, cut into wedges)', 325, 'Potato Salad', 'g', 4),
	('salad onions, thinly sliced', 2, 'Potato Salad', NULL, 4),
	('young spinach leaves', 100, 'Potato Salad', 'g', 4),
	('ripe tomato, peeled and seeded', 1, 'Potato Salad', NULL, 4),
	('pesto', 0.5, 'Potato Salad', 'tbsp', 4),
	('salt and freshly ground black pepper', NULL, 'Potato Salad', NULL, 4),
	('small lemon', 1, 'Gremolata', NULL, 4),
	('fat garlic clove, finely chopped', 1, 'Gremolata', NULL, 4),
	('handful of flat-leaf parsley, roughly torn', NULL, 'Gremolata', NULL, 4),
	('dried black beans', 10, NULL, 'g', 5),
	('olive oil', 1, NULL, 'tbsp', 5),
	('small red pepper, deseeded and thinly sliced', 0.5, NULL, NULL, 5),
	('small red onion, thinly sliced', 1, NULL, NULL, 5),
	('ground cumin', 1, NULL, 'tsp', 5),
	('garlic clove, finely chopped', 1, NULL, NULL, 5),
	('tomatoes, chopped', 2, NULL, NULL, 5),
	('small red chilli, finely chopped', 1, NULL, NULL, 5),
	('red wine vinegar', 1, NULL, 'tbsp', 5),
	('passata', 125, NULL, 'ml', 5),
	('feta cheese, crumbled', 100, NULL, 'g', 5),
	('corn chips, to serve', NULL, NULL, NULL, 5),
	('sheed ready-rolled puff pastry', 2, NULL, NULL, 6),
	('caster sugar', 0.5, NULL, 'cup', 6),
	('cornflour', 0.5, NULL, 'cup', 6),
	('custard powder', 0.25, NULL, 'cup', 6),
	('milk', 2.5, NULL, 'cup', 6),
	('butter', 30, NULL, 'g', 6),
	('egg yolk', 1, NULL, NULL, 6),
	('vanilla extract', 1, NULL, 'tsp', 6),
	('thickened cream', 0.75, NULL, 'cup', 6),
	('icing sugar', 1.5, 'Icing', 'cup', 6),
	('soft butter', 1, 'Icing', 'tsp', 6),
	('passion fruit pulp', 0.25, 'Icing', 'cup', 6);

INSERT INTO `recipe_segmented` (`recipeid`, `stepid`, `instruction`)
	VALUES
	(1, 1, 'Peel and finely grate the onion.'),
	(1, 2, 'Peel and crush the garlic.'),
	(1, 3, 'Finely chop the white part of the lemongrass.'),
	(1, 4, 'Place the chicken, onion, breadcrumbs, garlic, coriander, lime zest, lemongrass, fish sauce and sugar in a large bowl.'),
	(1, 5, 'Mix well with your hands.'),
	(1, 6, 'Shape into 2 patties.'),
	(1, 7, 'Cover and chill for at least 10 minutes.'),
	(1, 8, 'Heat a barbecue or griddle pan until hot.'),
	(1, 9, 'Brush the burgers with a little oil.'),
	(1, 10, 'Cook for 4 minutes on each side or until cooked through.'),
	(1, 11, 'Serve the burgers in soft rolls with lettuce, mint, coriander and chilli sauce.'),
	(2, 1, 'Preheat oven to 350 degrees F'),
	(2, 2, 'Marinate tomatoes in French Dressing'),
	(2, 3, 'Cut fish into pieces 2-3 inches long and place in a shallow baking dish.'),
	(2, 4, 'Add milk and bake for 20 minutes.'),
	(2, 5, 'Drain to reserve ¾ cup of the liquid'),
	(2, 6, 'Make a crust by combining the rice, butter and beating in one egg.'),
	(2, 7, 'Grease a pie plate and turn crusted into the plate evenly over the bottom.  Make sure sides and rim form a pie shell.'),
	(2, 8, 'Sprinkle shell with half of the cheese and arrange fish on top.  Then sprinkle remainder of the cheese.'),
	(2, 9, 'Combine the reserved liquid with egg and create a base for the quiche.  Pour into pie plate and bake for 30 minutes.'),
	(2, 10, 'Remove from oven and arrange tomatoes with the skin up around the outside.  Return to oven and bake for 10 minutes.'),
	(2, 11, 'Garnish with chives or chopped green onions.'),
	(3, 1, 'Retrieve a 3-quart saucepan and combine meat, water, spices and garlic.'),
	(3, 2, 'Cook over low heat, stiring constantly until meat is brown and half the liquid is gone.'),
	(3, 3, 'Cover and cook for about 45 minutes.'),
	(3, 4, 'While cooking meat, prepare potatoes.  Boil and mash.'),
	(3, 5, 'Mix the meat and potatoes and allow them to cool.'),
	(3, 6, 'Preheat oven to 450 degrees F'),
	(3, 7, 'Prepare crust for 2-crust, 9-inch pie.  Whisk the flour and salt.'),
	(3, 8, 'Blend or cut in butter and lard until it is in coarse crumbs.'),
	(3, 9, 'Drizzle with water, tossing a while with a fork until ragged dough forms, and adding 1 tablespoon more water if necessary.'),
	(3, 10, 'Divide dough in half and shape into disks.  Wrap and chill in fridge for 30 min.'),
	(3, 11, 'Roll out 1 dough into a 9-inch pie crust and line a pie plate.  Fill with the meat mixture.  Roll out and cover the pie with the second dough.'),
	(3, 12, 'Bake at 450 degrees F for 10 minutes and reduce heat to 350 degrees F.  Bake for 30-40 more minutes.'),
	(4, 1, 'Cook the potatoes in a large pan of lightly salted boiling water for 10-12
minutes or until just tender.'),
	(4, 2, 'Add the runner beans and cook for a further 2 minutes. Then drain and rinse under cold running water.'),
	(4, 3, 'Toss the potatoes and beans with the mixed tomatoes, salad onions and spinach and season to taste.'),
	(4, 4, 'For the gremolata, use a vegetable peeler to pare thin strips of rind from the lemon.'),
	(4, 5, 'Carefully remove as much white pith as possible (this is bitter). Finely chop the lemon rind and toss with the garlic and parsley. Season and set aside.'),
	(4, 6, 'Squeeze the juice from the lemon and whizz in a food processor with the peeled tomato and pesto for 10-15 seconds.'),
	(4, 7, 'Pour over the potato mixture and toss through. '),
	(4, 8, 'Scatter over the gremolata to serve.'),
	(5, 1, 'Soak the black beans in cold water overnight.'),
	(5, 2, 'Drain and rinse well.'),
	(5, 3, 'Put them in a large saucepan with plenty of water.'),
	(5, 4, 'Bring to the boil.'),
	(5, 5, 'Cook for 25-30 minutes, until soft to the bite.'),
	(5, 6, 'Drain well.'),
	(5, 7, 'Set aside.'),
	(5, 8, 'Heat the oil in a saucepan set over high heat.'),
	(5, 9, 'Add the red pepper and onion.'),
	(5, 10, 'Reduce the heat to low. 11. Cover and cook for about 8 minutes.'),
	(5, 11, 'Add the cumin, garlic and chillies.'),
	(5, 12, 'Cook for a further 2 minutes.'),
	(5, 13, 'Add the beans, tomatoes, vinegar and passata.'),
	(5, 14, 'Bring to the boil.'),
	(5, 15, 'Reduce the heat.'),
	(5, 16, 'Simmer rapidly for 10 minutes, until almost all the liquid has evaporated and the tomatoes start to look mushy.'),
	(5, 17, 'Preheat the grill to high.'),
	(5, 18, 'Transfer the bean mixture to a flameproof dish.'),
	(5, 19, 'Sprinkle the crumbled feta over the top.'),
	(5, 20, 'Cook under the hot grill until the cheese is soft and just starting to brown.'),
	(5, 21, 'Serve hot with corn chips on the side for dipping.'),
	(6, 1, 'Preheat oven to 240°C/220°C fan-forced. Grease deep, 23cm square cake pan; line with foil, extending the foil 10cm over the sides of pan.'),
	(6, 2, 'Place each pastry sheet on separate greased oven trays. Bake about 15 minutes, cool and flatten pastry with hands; place one pastry sheet in pan, trim to fit if necessary.'),
	(6, 3, 'Meanwhile, combine sugar, cornflour and custard powder in a medium saucepan; gradually add milk stirring until smooth. Add butter; stir over heat until mixture boils and thickens. Simmer, stirring, about 3minutes or until custard is thick and smooth. Remove from heat; stir in egg yolk and extract. Cover surface with clingfilm; cool to room temperature.'),
	(6, 4, 'Make passion fruit icing; place all ingredients into a heatproof bowl over a small saucepan of simmering water; stir until icing is spreadable.'),
	(6, 5, 'Whip cream till peaks form. Fold into custard in two batches. Spread custard mixture over pastry in pan. Top with remaining pastry, trim to fit if necessary; press down slightly. Spread pastry with icing; refrigerate 3 hours or overnight.');

INSERT INTO `recipe_step` (`recipeid`, `stepid`, `instruction`)
	VALUES
	(1, 1, 'Peel and finely grate 1 onion and place in a large bowl.'),
	(1, 2, 'Peel and crush 1 garlic clove, add to the bowl.'),
	(1, 3, 'Finely chop the white part of 1 lemongrass stalk, add to the bowl.'),
	(1, 4, 'Chop a sprig coriander leaves, add 1 tablespoon of leaves to the bowl.'),
	(1, 5, 'Zest 1 lime. Add 1 teaspoon of the zest to the bowl.'),
	(1, 6, 'Add the 200g chicken, 30g breadcrumbs, 1 teaspoon fish sauce and 1 teaspoon sugar to the bowl.'),
	(1, 7, 'Mix well with your hands.'),
	(1, 8, 'Shape into 2 burgers.'),
	(1, 9, 'Cover and chill for at least 10 minutes.'),
	(1, 10, 'Heat a barbecue or griddle pan until hot.'),
	(1, 11, 'Brush the burgers with a little oil.'),
	(1, 12, 'Cook for 4 minutes on each side or until cooked through.'),
	(1, 13, 'Serve the burgers in soft rolls with lettuce, mint, coriander and chilli sauce.'),
	(2, 1, 'Slice tomatoes into 6 wedges each'),
	(2, 2, 'Place tomato wedges in a bowl with French dressing to marinade'),
	(2, 3, 'Cut fish into slices of 2-3 inches long'),
	(2, 4, 'Place tomatoes in baking pan'),
	(2, 5, 'Place fish in baking pan'),
	(2, 6, 'Add milk to baking pan'),
	(2, 7, 'Heat oven to 350 degrees F'),
	(2, 8, 'Bake fish mixture for 20 min'),
	(2, 9, 'While fish is baking, boil rice until soft.'),
	(2, 10, 'Melt butter in a small saucepan'),
	(2, 11, 'Remove baking dish from oven and drain into bowl retaining at least ¾ of the mixture.'),
	(2, 12, 'Make rice crust. Place 3 cups of cooked rice and 2 tablespoons of melted butter in a bowl and mix.'),
	(2, 13, 'Beat 1 egg and whip it into the rice crust mixture.'),
	(2, 14, 'Spread rice crust mixture into a small pie plate.  Make the bottom even and ensure top of the plate is reached.'),
	(2, 15, 'Grate ½ cup of cheese.'),
	(2, 16, 'Sprinkle ½ cup of grated cheese onto pie crust.'),
	(2, 17, 'Lay out fish slides in pie crust.'),
	(2, 18, 'Grate ½ cup of cheese.'),
	(2, 19, 'Sprinkle ½ cup of grated cheese onto pie topping.'),
	(2, 20, 'Beat 2 eggs.'),
	(2, 21, 'Mix 2 beaten eggs with reserved mixture from fish and tomato bake.'),
	(2, 22, 'Pour egg mixture into pie crush.'),
	(2, 23, 'Bake for 30 min at 30 degrees F'),
	(2, 24, 'Remove from oven.'),
	(2, 25, 'Place tomato wedges around the edge with skin up.'),
	(2, 26, 'Bake for 10 more min.'),
	(2, 27, 'Chop green onions or chives.'),
	(2, 28, 'Place green onions or chives on top of baked pie.'),
	(3, 1, 'Get one 3-quart saucepan'),
	(3, 2, 'Mince 1 small onion finely'),
	(3, 3, 'Heat saucepan on low heat'),
	(3, 4, 'Add 1 ½ pounds of ground lean pork to saucepan'),
	(3, 5, 'Mix in 1 minced onion to meat'),
	(3, 6, 'Mix in 1 ½ teaspoons of salt.'),
	(3, 7, 'Mix in ¼ teaspoon of celery salt'),
	(3, 8, 'Mix in ¼ teaspoon of black pepper'),
	(3, 9, 'Mix in ¼ teaspoon of sage'),
	(3, 10, 'Mix in 1 knife-tip of ground cloves (1/16 teaspoon)'),
	(3, 11, 'Chop 1 garlic clove'),
	(3, 12, 'Mix in 1 garlic clove'),
	(3, 13, 'Cook while stiring slowly on low heat.  Stop when meat has turned brown and half of the liquid has evaporated.'),
	(3, 14, 'Cover pan and cook on low heat for 45 minutes.'),
	(3, 15, 'While meat is cooking boil a large pot of water.'),
	(3, 16, 'Place 3 potatoes in pot and boil until soft.'),
	(3, 17, 'Mash potatoes.'),
	(3, 18, 'When meat is done cooking, mix in potatoes and allow to cool.'),
	(3, 19, 'While cooling, make pie crust.  Begin by filling mixing bowl with 2 ½ cups of flour and ¾ teaspoon of salt.'),
	(3, 20, 'Cube ⅔ cup of butter'),
	(3, 21, 'Cube ⅓ cup of lard'),
	(3, 22, 'Blend in butter and lard to flour mixture'),
	(3, 23, 'Drizzle in small amounts of water while mixing until you reach ⅓ cup.  You may need to mix in an additional 1 teaspoon of water.  Mix until the texture is coarse.'),
	(3, 24, 'Divide dough into 2.'),
	(3, 25, 'Roll dough into disks.'),
	(3, 26, 'Cover dough with cling film and allow to cool in the fridge for 30 min.'),
	(3, 27, 'Roll one dough out to cover 9-inch pie plate.'),
	(3, 28, 'Cover 9-inch pie plate with pie crust dough.'),
	(3, 29, 'Add the cooled meat and potato mixture.'),
	(3, 30, 'Roll one dough out to form the top of the pie.'),
	(3, 31, 'Cover pie top.'),
	(3, 32, 'Flute and seal the pie.'),
	(3, 33, 'Preheat oven to 450 degrees F.'),
	(3, 34, 'Cook pie for 10 minutes at 450 degrees F.'),
	(3, 35, 'Reduce heat to 350 degrees F.'),
	(3, 36, 'Cook for 30-40 min at 350 degrees F.'),
	(4, 1, 'Fill a large pot with water and lightly salt.'),
	(4, 2, 'Boil water.'),
	(4, 3, 'Scrub and clean potatoes while the water boils.'),
	(4, 4, 'If potatoes are large, cut into bite-sized pieces.'),
	(4, 5, 'Add 225g of small new potatoes to boiling water and boil for approximately 10-12 minutes.'),
	(4, 6, 'Cut runner beans diagonally into slices.'),
	(4, 7, 'Add runner beans to boiling water and cook for a further 2 minutes.'),
	(4, 8, 'Drain and rinse potatoes and beans under cold running water.'),
	(4, 9, 'Quarter 325 g of ripe mixed tomatoes into slices.'),
	(4, 10, 'Slice 2 salad onions thinly.'),
	(4, 11, 'Remove 100 g of spinach leaves and brush clean.'),
	(4, 12, 'Toss tomatoes, onions, spinach and boiled vegetables together.'),
	(4, 13, 'Season with salt and pepper to taste.'),
	(4, 14, 'For the gremolata, use a vegetable peeler to pare thin strips of rind from 1 lemon.'),
	(4, 15, 'Carefully remove as much white pith as possible (this is bitter) from the lemon.'),
	(4, 16, 'Chop 1 garlic clove very finely'),
	(4, 17, 'Tear the flat leave parsley into small pieces.'),
	(4, 18, 'Finely chop the lemon rind.'),
	(4, 19, 'Toss lemon rind with the garlic and parsley.'),
	(4, 20, 'Season with salt and pepper and set gremolata aside.'),
	(4, 21, 'Squeeze the juice from the lemon.'),
	(4, 22, 'Peel and de-seed one tomato.'),
	(4, 23, 'Add lemon juice, tomatoes and pesto to a food processor and slice finely for 10-15 seconds.'),
	(4, 24, 'Pour over the potato mixture and toss thoroughly.'),
	(4, 25, 'Scatter over the gremolata to serve.'),
	(5, 1, 'Soak 50g black beans in cold water overnight OR use 100g canned red kidney beans and skip to step 7.'),
	(5, 2, 'Drain and rinse well.'),
	(5, 3, 'Put them in a large saucepan with plenty of water.'),
	(5, 4, 'Bring to the boil.'),
	(5, 5, 'Cook for 25-30 minutes, until soft to the bite.'),
	(5, 6, 'Drain well and set aside.'),
	(5, 7, 'Deseed 1/2 red pepper and slice thinly and place on a small dish.'),
	(5, 8, 'Thinly slice 1 red onion. Add to the red pepper.'),
	(5, 9, 'Finely chop 1 garlic clove and place on another small dish.'),
	(5, 10, 'Finely chop 1 red chilli. Add to the garlic.'),
	(5, 11, 'Add 1 teaspoon ground cumin to the chilli and garlic. '),
	(5, 12, 'Chop 2 tomatoes.'),
	(5, 13, 'Heat the oil in a saucepan set over high heat.'),
	(5, 14, 'Add the red pepper and onion.'),
	(5, 15, 'Reduce the heat to low.'),
	(5, 16, 'Cover and cook for about 8 minutes.'),
	(5, 17, 'Add the cumin, garlic and chillies.'),
	(5, 18, 'Cook for a further 2 minutes.'),
	(5, 19, 'Add the beans, tomatoes, 1 tablespoon vinegar and 125ml passata.'),
	(5, 20, 'Bring to the boil.'),
	(5, 21, 'Reduce the heat.'),
	(5, 22, 'Simmer rapidly for 10 minutes, until almost all the liquid has evaporated and the tomatoes start to look mushy.'),
	(5, 23, 'Preheat the grill to high.'),
	(5, 24, 'Transfer the bean mixture to a flameproof dish.'),
	(5, 25, 'Crumble 100g feta cheese.'),
	(5, 26, 'Sprinkle the crumbled feta over the top of the bean mixture.'),
	(5, 27, 'Cook under the hot grill until the cheese is soft and just starting to brown.'),
	(5, 28, 'Serve hot with corn chips on the side for dipping.'),
	(6, 1, 'Preheat oven to 240°C/220°C fan driven.'),
	(6, 2, 'Grease a deep 23cm square cake pan.'),
	(6, 3, 'Line the pan with foil, extending foil 10cm over sides of pan to act as handles to release the delicate slice once finished.'),
	(6, 4, 'Grease two oven trays and set aside.'),
	(6, 5, 'Opening your package of puff pastry and removing two sheets put them on the oven trays.'),
	(6, 6, 'Once oven is hot bake puff pastry sheets15 minutes then cool.'),
	(6, 7, 'Flatten out with your hand.'),
	(6, 8, 'Measure and trim both to fit into the cake pan.'),
	(6, 9, 'Place one of the two into the bottom of the pan.'),
	(6, 10, 'Add 110 grams of sugar to a medium saucepan.'),
	(6, 11, 'Add 75 grams cornflour to the saucepan.'),
	(6, 12, 'Add powdered custard mix to the saucepan.'),
	(6, 13, 'Then gradually add the 625 ml milk, stirring until smooth.'),
	(6, 14, 'Set burner to medium high heat'),
	(6, 15, 'Add 30g of butter to the saucepan.'),
	(6, 16, 'Then stir until mixture boils; simmer while stirring, about 3 minutes or until custard is thick and smooth.'),
	(6, 17, 'Remove from heat.'),
	(6, 18, 'Separate the yolk from the white of 1 egg, set the white aside, it is unneeded.'),
	(6, 19, 'Add the egg yolk to the custard mixture.'),
	(6, 20, 'Add 1 tsp of vanilla extract as well.'),
	(6, 21, 'Stir the custard mixture well.'),
	(6, 22, 'Cover with plastic wrap and set aside to cool to room temperature.'),
	(6, 23, 'For the icing, get a small saucepan and a heatproof bowl.'),
	(6, 24, 'Fill the saucepan 2/3 the way with water and heat on high till it simmers (low boil).'),
	(6, 25, 'Set the heatproof bowl overtop like a lid so it gently warms the bottom.'),
	(6, 26, 'Add 240 grams of icing sugar to the heatproof bowl.'),
	(6, 27, 'Add 1 tsp of soft butter to the heatproof bowl.'),
	(6, 28, 'Add 1 can of passion fruit pulp to the heat proof bowl.'),
	(6, 29, 'Mix until the icing is spreadable and pours gently off of your spoon.'),
	(6, 30, 'Get out a hand mixer and medium mixing bowl.'),
	(6, 31, 'On a medium setting whip the 180 ml thickened cream until it forms stif peaks.'),
	(6, 32, "Using a spatula, fold it into the custard mixture gently, to not break the bubbles. It\'s best to do this in two halves to be more manageable."),
	(6, 33, 'Spread the mixture over the puff pastry in the bottom of the cake pan, smoothing it out.'),
	(6, 34, 'Top with the other sheet of the pastry and gently press into the custard.'),
	(6, 35, 'Spread the icing over the top smoothly.'),
	(6, 36, 'Leave to rest overnight or at least 3 hours.');

INSERT INTO `recipe_segmented_ingredient` (`recipeid`, `name`, `quantity`, `section`, `units`, `replaces`)
	VALUES
	(3, 'ground cloves', 1, NULL, 'pinch', NULL),
	(3, 'all purpose flour', 2.5, NULL, 'cups', NULL),
	(3, 'salt', 0.75, NULL, 'tsp', NULL),
	(3, 'cold unsalted butter, cubed', 0.67, NULL, 'cup', NULL),
	(3, 'cold lard, cubed', 0.67, NULL, 'cup', NULL),
	(3, 'cold water', 0.67, NULL, 'cup', NULL);

INSERT INTO `recipe_step_ingredient` (`recipeid`, `name`, `quantity`, `section`, `units`, `replaces`)
	VALUES
	(2, 'medium tomatoes', 2, NULL, NULL, 11),
	(2, 'French Dressing', 0.5, NULL, 'cup', 11),
	(2, 'rice', 1.5, NULL, 'cup', 14),
	(2, 'butter', 2, NULL, 'tbsp', 15),
	(2, 'eggs', 3, NULL, NULL, 16),
	(2, 'Green Onions or Chives', NULL, NULL, NULL, NULL),
	(3, 'ground lean pork', 1.5, 'Pie Filling', 'pound', 18),
	(3, 'small onion minced', 1, 'Pie Filling', NULL, 19),
	(3, 'boiling water', 0.5, 'Pie Filling', 'cup', 20),
	(3, 'garlic clove, chopped', 1, 'Pie Filling', NULL, 21),
	(3, 'salt', 1.5, 'Pie Filling', 'tsp', 22),
	(3, 'celery salt', 0.25, 'Pie Filling', 'tsp', 23),
	(3, 'black pepper', 0.25, 'Pie Filling', 'tsp', 24),
	(3, 'sage', 0.25, 'Pie Filling', 'tsp', 25),
	(3, 'ground cloves', NULL, 'Pie Filling', 'pinch', 26),
	(3, 'potatoes', 3, 'Pie Filling', NULL, NULL),
	(3, 'flour', 2.5, 'Pie crust', 'cup', NULL),
	(3, 'salt', 0.75, 'Pie crust', 'tsp', NULL),
	(3, 'cold unsalted butter', 0.67, 'Pie crust', 'cup', NULL),
	(3, 'cold lard', 0.33, 'Pie crust', 'cup', NULL),
	(3, 'cold water', 0.33, 'Pie crust', 'cup', NULL),
	(4, 'salad onions', 2, 'Potato Salad', NULL, 30),
	(4, 'ripe tomato', 1, 'Potato Salad', NULL, 32),
	(4, 'small lemon', 1, 'Gremolata', NULL, 35),
	(4, 'handful of flat-leaf parsley', NULL, 'Gremolata', 'handful', 37),
	(5, 'dried black beans or 100g canned red kidney beans', 50, NULL, 'g', 38),
	(5, 'small red pepper', 1, NULL, NULL, 40),
	(5, 'small red onion', 1, NULL, NULL, 41),
	(5, 'garlic clove', 1, NULL, NULL, 43),
	(5, 'tomatoes', 2, NULL, NULL, 44),
	(5, 'small red chilli', 1, NULL, NULL, 45),
	(5, 'feta cheese', 100, NULL, 'g', 48);
