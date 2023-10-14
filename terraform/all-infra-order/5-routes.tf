
resource "aws_route_table" "private" {
  vpc_id = aws_vpc.abp_main_vpc.id

  route = {
    cidr_block     = "0.0.0.0/0"
    nat_gateway_id = aws_nat_gateway.abp_nat.id
  }

  tags = {
    Name = "Abp-Nate"
  }
}


resource "aws_route_table" "public" {
  vpc_id = aws_vpc.abp_main_vpc.id

  route = {
    cidr_block     = "0.0.0.0/0"
    nat_gateway_id = aws_internet_gateway.abp_gatway.id
  }

  tags = {
    Name = "Abp-Nate-Public"
  }
}


